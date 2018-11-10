@extends('layouts.app')

@section('content')

<h1 style="color: #2E8B57; text-decoration: underline">Recipe Listings</h1><hr>
<a href="/recipes/create" class="btn btn-primary mb-3">Upload a Recipe</a>

@if(count($recipes) > 0)
  @foreach($recipes as $recipe)
    <?php $time = substr($recipe->created_at, 0, 10); ?>
    <div class="card mb-3 p-2" style="background: #FFA07A; border: 3px solid #8B0000">
      <div class"card-body">
        <h3 class="card-title font-weight-bold"><a href="/recipes/{{$recipe->id}}" class="text-dark">{{$recipe->name}}</a><small class="float-right">Created: <?php echo $time; ?></small></h3><hr>
        <p class="lead font-italic text-white">{{$recipe->description}}</p>
        <img style="width: 10%; margin-top: -80px" class="float-right" src="/storage/cover_images/{{$recipe->cover_pic}}">
      </div>
    </div>

  @endforeach
  {{$recipes->links()}}
@else
  <p>Nothing to See</p>
@endif
@endsection
