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
//Route::get('admin_login','')

Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::group(['middleware'=>"role:admin"],function (){

    Route::get('/admin',"AdminController@admin")->name("admin");

    Route::get('/admin/tours',"AdminController@Tours")->name("tours");
    // add
    Route::post('/admin/add_tour',"AdminController@addTours")->name("add_tour");
    //all
    Route::get("/admin/all_tours","AdminController@allTours")->name("all_tours");
    Route::get('/{slug?}', 'HomeController@viewOneTour')->name('oneTour');

    Route::get('/admin/filterToutAdmin/{some_path?}', "AdminController@filterToutAdmin")->where('some_path', '(.*)')->name('filter');
    //delete
    Route::get('/admin/tour/delete/{id}', 'AdminController@deletetour')->name('deletetour');
    //edit
    Route::get("/admin/tour/edit_tours/{id}","AdminController@editTours")->name("edit_tours");
    Route::post('/admin/tour/save', 'AdminController@saveEditTour')->name("save_edit_tour");

    Route::group(['middleware' => 'auth'], function () {
        Route::get('/laravel-filemanager', '\UniSharp\LaravelFilemanager\Controllers\LfmController@show');
        Route::post('/laravel-filemanager/upload', '\UniSharp\LaravelFilemanager\Controllers\UploadController@upload');
        // list all lfm routes here...
    });



});
