@extends('layouts.app')

@section('content')

<h1 style="color: #2E8B57; text-decoration: underline">Upload Your Recipe</h1><hr>

{!! Form::open(['action' => 'RecipesController@store', 'method' => 'POST', 'class'=>'p-3', 'enctype' => 'multipart/form-data', 'style' => 'background: #FFA07A; border: 3px solid #8B0000']) !!}
    <div class="form-group">
        {{Form::label('name', 'Name', ['class' => 'lead text-white'])}}
        {{Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Recipe Name...'])}}
    </div>
    <div class="form-group">
            {{Form::label('description', 'Description', ['class' => 'lead text-white'])}}
            {{Form::textarea('description', '', ['class' => 'form-control', 'placeholder' => 'Describe it...'])}}
    </div>
    <div class="form-group">
            {{Form::label('procedures', 'Procedures', ['class' => 'lead text-white'])}}
            {{Form::textarea('procedures', '', ['class' => 'form-control', 'placeholder' => 'How to make it'])}}
    </div>

    <div class="form-group">
        {{Form::file('cover_pic', ['class' => 'text-white'])}}
    </div>

    {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
{!! Form::close() !!}
@endsection
