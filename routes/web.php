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

/*Route::middleware(['role'])->group(function () {
    Route::get('admin', 'AdminController@admin');
    Route::get('/categories/delete/{id}', 'HomeController@categoryDelete')->name('categories.delete');
    Route::get('/categories/create/{slug?}', 'HomeController@create')->name('categories.create');
    Route::post('/categories/save', 'HomeController@save')->name('categories.save');
    Route::get('/categories/{slug}', 'HomeController@category')->name('categories.show');

});*/

Route::group(['middleware'=>"role:admin"],function (){

    Route::get('/admin',"AdminController@admin")->name("admin");

    Route::get('/admin/tours',"AdminController@Tours")->name("tours");
    // add
    Route::post('/admin/add_tour',"AdminController@addTours")->name("add_tour");
    //all
    Route::get("/admin/all_tours","AdminController@allTours")->name("all_tours");
    //delete
    Route::get('/admin/tour/delete/{id}', 'AdminController@deletetour')->name('deletetour');
    //edit
    Route::get("/admin/tour/edit_tours/{id}","AdminController@editTours")->name("edit_tours");
    Route::post('/admin/tour/save', 'AdminController@saveEditTour')->name("save_edit_tour");






    Route::get("/admin/property","ControllerAdmin@allprop");

    Route::get("/admin/goods","ControllerAdmin@goods");

    //api_handle
    Route::get('/admin/property/getforcat/{id}',"ControllerAdmin@getProperties");

    //append handlers
    Route::post('/admin/addcategory',"ControllerAdmin@addcategory")->name("addcategoryhandler");
    Route::post('/admin/addgood',"ControllerAdmin@addgood")->name("addgoodhandler");
    Route::post("/admin/property/addhandle","ControllerAdmin@addprophandle");
    //delete handlers
    Route::get('/admin/category/delete/{id}',"ControllerAdmin@delcategoryhandle");
    Route::get('/admin/goods/delete/{id}',"ControllerAdmin@delgoodshandle");
    Route::get('/admin/property/delete/{id}',"ControllerAdmin@delprophandle");


});
