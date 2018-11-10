@extends('layouts.app')

@section('content')

<a href="/recipes" class="btn btn-primary" style="background:	#2E8B57">Go Back</a>
<div class="card mt-3" style="border: 3px solid #8B0000">
  <div class="card-body">
    <h1 class="card-title">{{$recipe->name}}</h1><hr>

    <img style="width: 25%; border: 3px solid #8B0000" src="/storage/cover_images/{{$recipe->cover_pic}}"><hr>
    <div class="card-text">
      <?php $time = substr($recipe->created_at, 0, 10); ?>
      <p><span class="lead">Date: </span><?php echo $time;?></p>
      <p><span class="lead">Description: </span>{{$recipe->description}}</p>
      <p><span class="lead">How To Make: </span>{{$recipe->procedures}}</p>
    </div>
    <hr>
    @if(!Auth::guest())
        @if(Auth::user()->id == $recipe->user_id)
            <a href="/recipes/{{$recipe->id}}/edit" class="btn btn-primary">Edit</a>
            {!!Form::open(['action' => ['RecipesController@destroy', $recipe->id], 'method' => 'POST', 'class' => 'float-right'])!!}
                {{Form::hidden('_method', 'DELETE')}}
                {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
            {!!Form::close()!!}
        @endif
    @endif
  </div>
</div>
@endsection
