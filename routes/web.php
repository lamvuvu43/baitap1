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
    return view('task1.ho_khau.list_ho_khau');
});

Route::group(['prefix' => 'ho_khau'], function () {
    Route::get('/', function () {
        return view('task1.ho_khau.list_ho_khau');
    })->name('ho_khau');
    Route::get('/list_ho_khau', 'HoKhauController@index')->name('list_ho_khau');
    Route::get('/add_ho_khau', 'HoKhauController@create')->name('add_ho_khau');
    Route::post('/process_add_ho_khau', 'HoKhauController@store')->name('process_add_ho_khau');
    Route::get('/edit_ho_khau/{id}', 'HoKhauController@show')->name('edit_ho_khau');
    Route::post('/process_edit_ho_khau/{id}', 'HoKhauController@update')->name('process_edit_ho_khau');
   
    Route::DELETE('/delete_ho_khau/{id}', 'HoKhauController@destroy')->name('delete_ho_khau');
});

Route::group(['prefix' => 'nhan_khau'], function () {
    Route::get('/', function () {
        return view('task2.nhan_khau.list_nhan_khau');
    });
    Route::get('/list_nhan_khau','NhanKhauController@index')->name('list_nhan_khau');
    Route::get('/add_nhan_khau','NhanKhauController@create')->name('add_nhan_khau');
    Route::post('/process_add_nhan_khau','NhanKhauController@store')->name('process_add_nhan_khau');
    Route::get('/edit_nhan_khau/{id}','NhanKhauController@show')->name('edit_nhan_khau');
    Route::get('/process_edit_nhan_khau/{id}','NhanKhauController@update')->name('process_edit_nhan_khau');
});
