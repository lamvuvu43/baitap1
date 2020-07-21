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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/ho_khau',function ()
{
   return view('task1.ho_khau.list_ho_khau');
})->name('ho_khau');

Route::get('/add_ho_khau','HoKhauController@create')->name('add_ho_khau');
Route::post('/process_add_ho_khau','HoKhauController@store')->name('process_add_ho_khau');
Route::POST('/edit_ho_khau/{id}','HoKhauController@show')->name('edit_ho_khau');
Route::post('/process_edit_ho_khau/{id}','HoKhauController@update')->name('process_edit_ho_khau');


Route::get('/list_ho_khau','HoKhauController@index')->name('list_ho_khau');
Route::DELETE('/delete_ho_khau/{id}','HoKhauController@destroy')->name('delete_ho_khau');