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



Route::Auth();

Route::get('/', function () {
    return view('auth.login');
});
Route::post('/hk_login', 'Auth\LoginController@hk_login')->name('hk_login');
Route::post('/nk_login', 'Auth\LoginController@nk_login')->name('nk_login');




Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'manager', 'middleware' => 'auth'], function () {
    Route::group(['prefix' => 'ho_khau'], function () {
        Route::get('/', function () {
            return view('task1.ho_khau.list_ho_khau');
        })->name('ho_khau');
        Route::get('/list_ho_khau', 'HoKhauController@index')->name('list_ho_khau');
        Route::get('/add_ho_khau', 'HoKhauController@create')->name('add_ho_khau');
        Route::get('/add_nhan_khau/{id_hk}', 'HoKhauController@add_nhan_khau')->name('add_nhan_khau');
        Route::POST('/process_add_ho_khau', 'HoKhauController@store')->name('process_add_ho_khau');
        Route::get('/edit_ho_khau/{id}', 'HoKhauController@show')->name('edit_ho_khau');
        Route::post('/process_edit_ho_khau/{id}', 'HoKhauController@update')->name('process_edit_ho_khau');
        Route::DELETE('/delete_ho_khau/{id}', 'HoKhauController@destroy')->name('delete_ho_khau');
        Route::get('/get_list_nhankhau/{id}', 'HoKhauController@getListNhanKhau')->name('get_list_nhan_khau');
        Route::get('/add_member/{id}', 'HoKhauController@add_member')->name('add_member');

        Route::get('/nhan_khau', function () {
            return view('task2.nhan_khau.list_nhan_khau');
        })->name('nhan_khau');
        Route::get('/list_nhan_khau', 'NhanKhauController@index')->name('list_nhan_khau');
        Route::get('/add_nhan_khau/{id_hk}', 'NhanKhauController@create')->name('add_nhan_khau');
        Route::post('/process_add_nhan_khau', 'NhanKhauController@store')->name('process_add_nhan_khau');
        Route::get('/edit_nhan_khau/{id}', 'NhanKhauController@show')->name('edit_nhan_khau');
        Route::POST('/process_edit_nhan_khau/{id}', 'NhanKhauController@update')->name('process_edit_nhan_khau');
        Route::DELETE('/process_delete/nhan_khau/{id}', 'NhanKhauController@destroy')->name('delete_nhan_khau');
    });
    Route::group(['prefix' => 'exportcsv'], function () {
        Route::get('/nhankhau', 'ExportCSVController@ExportNhanKhau')->name("export_nk");
        Route::get('/nhankhau_shift', 'ExportCSVController@ExportNhanKhau_SHITF_JIS')->name("export_nk_shift");
    });
    
    Route::get('/nhan_khau_after_add/{id_hk}', 'NhanKhauController@nhan_khau_by_after_add')->name('nhan_khau_after_add');
    Route::get('/list_nhan_khau_after_add/{id_hk}', 'NhanKhauController@list_nhan_khau_after_add')->name('list_nhan_khau_after_add');
});

Route::group(['prefix' => 'user', 'middleware' => 'nhan_khau_login'], function () {
    Route::group(['prefix' => 'nhan_khau'], function () {
        Route::get('/nhan_khau_by_hk', 'NhanKhauController@nhan_khau_by_hk')->name('nhan_khau_by_hk');
        Route::get('/list_nhan_khau_by_hk', 'NhanKhauController@list_nhan_khau_by_hk')->name('list_nhan_khau_by_hk');
    });
});
