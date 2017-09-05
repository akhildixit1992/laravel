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
 Route::get('', array('as'=>'', 'uses'=>'ArticlesController@Index'));
//route for create employee page.
Route::get('/articles/create',array('as'=>'articles.create', 'uses'=>'ArticlesController@create'));
//route for edit employee page.
Route::get('/articles/edit/{id}', array('as'=>'articles.edit','uses'=>'ArticlesController@edit'));
//route for delete emplooyee page
 Route::get('/articles/delete/{id}', array('as'=>'articles.delete','uses'=>'ArticlesController@delete'));
 //route to show particular article
 Route::get('/articles/show/{id}', array('as'=>'articles.show','uses'=>'ArticlesController@show'));
 
 Route::get('/articles/comment/{id}', array('as'=>'articles.comment','uses'=>'ArticlesController@comment'));
// route for form submission call handleCreate method.

Route::post('articles/create', array('as'=>'articles.create','uses'=>'ArticlesController@handleCreate'));
 //route to handle edit form submission
Route::post('articles/edit/{id}', array('as'=>'articles.edit','uses'=>'ArticlesController@handleEdit'));
//route to handle delete.
Route::post('articles/delete/{id}', array('as'=>'articles.delete','uses'=>'ArticlesController@handleDelete'));
Route::post('articles/comment/{id}', array('as'=>'articles.comment','uses'=>'ArticlesController@handleComment'));