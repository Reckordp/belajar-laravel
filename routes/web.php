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

use Illuminate\Database\Eloquent\Model;


Route::get('/', function () {
  return view('laman_utama', ['d_project' => \App\Project::all()]);
});

Route::get('/produk/{id}', function($id) {
	return view('produk', ['proj' => \App\Project::find($id)]);
});

Route::get("/login", "UserController@login");
Route::post("/login", "UserController@auth");