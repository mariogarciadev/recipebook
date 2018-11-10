@extends('layouts.app')

@section('content')

<h1 style="color: #2E8B57; text-decoration: underline">Edit Recipe</h1><hr>

{!! Form::open(['action' => ['RecipesController@update', $recipe->id], 'method' => 'POST', 'class'=>'p-3', 'enctype' => 'multipart/form-data', 'style' => 'background: #FFA07A; border: 3px solid #8B0000']) !!}
    <div class="form-group">
        {{Form::label('name', 'Name', ['class' => 'lead text-white'])}}
        {{Form::text('name', $recipe->name, ['class' => 'form-control', 'placeholder' => 'Recipe Name...'])}}
    </div>
    <div class="form-group">
            {{Form::label('description', 'Description', ['class' => 'lead text-white'])}}
            {{Form::textarea('description', $recipe->description, ['class' => 'form-control', 'placeholder' => 'Describe it...'])}}
    </div>
    <div class="form-group">
            {{Form::label('procedures', 'Procedures', ['class' => 'lead text-white'])}}
            {{Form::textarea('procedures', $recipe->procedures, ['class' => 'form-control', 'placeholder' => 'This is how...'])}}
    </div>
    <div class="custom-file mb-3">
      <input class="custom-file-input" type="file" id="myFile">
      <label class="custom-file-label" for="myFile">Choose File</label>
    </div>
    {{Form::hidden('_method', 'PUT')}}
    {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
{!! Form::close() !!}
@endsection
