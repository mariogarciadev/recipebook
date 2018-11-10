@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="background: #FFA07A; border: 3px solid #8B0000">
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <a href="recipes/create" class="btn btn-primary mb-3">Upload New Recipe</a>
                    <h1 class="text-white">Your Recipes</h1>
                    @if(count($recipes) > 0)
                        <table class="table table-striped" style="background: white; border: 1px solid black">
                            <tr>
                                <th>Name</th>
                                <th></th>
                                <th></th>
                            </tr>
                            @foreach($recipes as $recipe)
                                <tr>
                                    <td>{{$recipe->name}}</td>
                                    <td><a href="recipes/{{$recipe->id}}/edit" class="btn btn-outline-primary">Edit</a></td>
                                    <td>
                                        {!!Form::open(['action' => ['RecipesController@destroy', $recipe->id], 'method' => 'POST', 'class' => 'float-right'])!!}
                                            {{Form::hidden('_method', 'DELETE')}}
                                            {{Form::submit('Delete', ['class' => 'btn btn-outline-danger'])}}
                                        {!!Form::close()!!}
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    @else
                      <p>You have no recipes</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
