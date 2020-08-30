<?php

use App\Http\Controllers\BookController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//CARA RIBETNYA
// Route::get('books','BookController@index');//show all data
// Route::post('books','BookController@store');//create new data
// Route::get('books/{id}','BookController@show');//show data by id (detail data)
// Route::put('books','BookController@update');//update data
// Route::delete('books','BookController@destroy');//delete data

Route::resource('books','BookController');
Route::resource('books/{{id}}','BookController');