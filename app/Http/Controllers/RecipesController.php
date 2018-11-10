<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Recipe;
use Illuminate\Support\Facades\Storage;

class RecipesController extends Controller
{
    // Authorizes all EXCEPT index and show
    public function __construct(){
        $this->middleware('auth')->except(['index', 'show']);
    }

    // Loads main recipes page
    public function index(){
        $recipes = Recipe::orderby('created_at', 'desc')->paginate(5);
        return view('recipes.index')->with('recipes', $recipes);
    }

    // Shows recipe display
    public function show($id){
        $recipe = Recipe::find($id);
        return view('recipes.show')->with('recipe', $recipe);
    }

    // Create form for new recipe
    public function create(){
        return view('recipes.create');
    }

    // Store function stores the new recipe
    public function store(Request $request){
        // Validation of inputs
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'procedures' => 'required',
            'cover_pic' => 'image|nullable|max:1999'
        ]);

        // Verifies cover picture
        if($request->hasFile('cover_pic')){
            // Get file name with extensiion
            $fileNameWithExt = $request->file('cover_pic')->getClientOriginalName();
            // Get file name
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            // Get file file extension
            $extension = $request->file('cover_pic')->getClientOriginalExtension();
            // Make final file
            $fileNameToSave = $fileName . '_' . time() . '.' . $extension;
            //Upload pic
            $path = $request->file('cover_pic')->storeAs('public/cover_images', $fileNameToSave);
        }
        else {
            $fileNameToSave = 'noImage.jpg';
        }

        // Make new recipe
        $recipe = new Recipe;
        $recipe->name = $request->input('name');
        $recipe->description = $request->input('description');
        $recipe->procedures = $request->input('procedures');
        $recipe->cover_pic = $fileNameToSave;
        $recipe->user_id = auth()->user()->id;
        $recipe->save();

        return redirect('/recipes')->with('success', 'Recipe Created');
    }

    public function edit($id){
        $recipe = Recipe::find($id);

        if(auth()->user()->id != $recipe->user_id){
          return redirect('/recipes')->with("error", 'You\'re Unauthorized to Edit');
        }
        return view('recipes.edit')->with('recipe', $recipe);
    }

    public function update(Request $request, $id){
      // Validation of inputs
      $this->validate($request, [
          'name' => 'required',
          'description' => 'required',
          'procedures' => 'required',
      ]);

      // Verifies cover picture
      if($request->hasFile('cover_pic')){
          // Get file name with extensiion
          $fileNameWithExt = $request->file('cover_pic')->getClientOriginalName();
          // Get file name
          $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
          // Get file file extension
          $extension = $request->file('cover_pic')->getClientOriginalExtension();
          // Make final file
          $fileNameToSave = $fileName . '_' . time() . '.' . $extension;
          // Upload pic
          $path = $request->file('cover_pic')->storeAs('public/cover_images', $fileNameToSave);
      }

      // Make new recipe
      $recipe = Recipe::find($id);
      $recipe->name = $request->input('name');
      $recipe->description = $request->input('description');
      $recipe->procedures = $request->input('procedures');
      if($request->hasFile('cover_pic')){
          $recipe->cover_pic = $fileNameToSave;
      }

      // Save & redirect to recipe index
      $recipe->save();
      return redirect('/recipes')->with('success', 'Recipe Edited');
    }

    public function destroy($id){
      $recipe = Recipe::find($id);
      if(auth()->user()->id != $recipe->user_id){
        return redirect('/recipes')->with("error", "You\'re Unauthorized to Remove Recipe");
      }

      if($recipe->cover_pic != 'noImage.jpg') {
          Storage::delete('public/storage/cover_images'.$recipe->cover_pic);
      }

      $recipe->delete();
      return redirect('/recipes')->with('success', 'Recipe Removed');
    }
}
