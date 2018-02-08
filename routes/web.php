<?php


use Yajra\Datatables\Datatables;


Route::get('/', function () {
    return view('welcome');
});

Route::view('welcome','home.index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::view('/admin','admin.index');
Route::view('/profile','admin.profile');
Route::get('/tasks',function()
{

    $tasks = \DB::table('tasks')->get();
    return Datatables::of($tasks)->make(true);
   // return $tasks;

});

