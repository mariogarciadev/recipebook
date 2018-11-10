@extends('layouts.app')

@section('content')
<div class="jumbotron text-center text-light bg-success">
    <h1 class="display-4">Welcome To The RecipeBook</h1>
    <p class="lead">This was made by Mario</p>
    <hr class="my-4">
      <button
       class="btn btn-primary"
       type="button"
       data-toggle="modal"
       data-target="#aboutModal"
       name="button">
       About RecipeBook
      </button>
</div>

<div class="row">
  <div class="col bg-danger text-white border border-danger rounded px-3 pt-3"  id="indexCard1">
    <h4>Read Recipes</h4><hr>
    <p class="lead font-italic">Take a look at how to make food.</p>
  </div>
  <div class="col bg-warning border border-warning rounded mx-3 px-3 pt-3" id="indexCard2">
    <h4>Upload Your Own</h4><hr>
    <p class="lead font-italic">Have a recipe yourself? Share it.</p>
  </div>
  <div class="col bg-primary text-white border border-primary rounded px-3 pt-3" id="indexCard3">
    <h4>Explore Other Users</h4><hr>
    <p class="lead font-italic">See who else is having fun.</p>
  </div>
</div>

<div class="modal fade" tabindex="-1" role="dialog" id="aboutModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content text-white" style="background: #FFA07A; border: 3px solid #8B0000">
      <div class="modal-header">
        <h4 class="modal-title" style="color: #8B0000">About</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p class="lead">This simple website was made by Mario, mainly using basic HTML, CSS, and Bootstrap in the context of the PHP framework, Laravel.</p>
        <br>
        <p class="lead" style="color: #8B0000">Here You'll see: </p>
          <ul>
            <li class="mb-2" ><span style="text-decoration: underline; color: #8B0000">HTML:</span> Tags set up properly, form setups, appropiate sizing, margins, and padding of tags. Proper syntax is implemented.</li>
            <li class="mb-2"><span style="text-decoration: underline; color: #8B0000">CSS:</span> Extensive use of the existing Bootstrap extension, along with inline CSS where needed for customization. Tables, lists, headers, navigation bars, are visually appealing.</li>
            <li><span style="text-decoration: underline; color: #8B0000">PHP:</span> The website is created with Laravel, & includes full CRUD functionality, makes use of session variables, form validation, proper connections of URLs with their respective controllers, and database dependency.</li>
          </ul>
      </div>
    </div>
  </div>
</div>

@endsection
