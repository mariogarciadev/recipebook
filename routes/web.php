<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/* PAGES-CONTROLLER ROUTES */
Route::get('/', 'PagesController@index');

/* RECIPE-CONTROLLER ROUTES */
Route::resource('recipes', 'RecipesController');

/* AUTH ROUTES */
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
