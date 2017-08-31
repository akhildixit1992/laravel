<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

// connect with corresponding model.
Route::model('article', 'Article');
//route for index page, call index method of controller
 Route::get('/', 'ArticlesController@Index');
//route for create employee page.
Route::get('/create',array('as'=>'create', 'uses'=>'ArticlesController@create'));
//route for edit employee page.
Route::get('/edit/{id}', array('as'=>'edit','uses'=>'ArticlesController@edit'));
//route for delete emplooyee page
 Route::get('/delete/{id}', array('as'=>'delete','uses'=>'ArticlesController@delete'));
 //route to show particular article
 Route::get('/show/{id}', array('as'=>'show','uses'=>'ArticlesController@show'));
 
 Route::get('/comment/{id}', array('as'=>'comment','uses'=>'ArticlesController@comment'));
// route for form submission call handleCreate method.

Route::post('/create', 'ArticlesController@handleCreate');
 //route to handle edit form submission
Route::post('/edit/{id}', array('as'=>'edit','uses'=>'ArticlesController@handleEdit'));
//route to handle delete.
Route::post('/delete/{id}', 'ArticlesController@handleDelete');
Route::post('/comment/{id}', 'ArticlesController@handleComment');