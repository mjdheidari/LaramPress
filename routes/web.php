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

use http\Client\Request;

Route::group(['namespace'=>'Theme',] , function (){
    Route::get('/blog' , 'HomepageController@blog');
    Route::get('/category/{cat}' , 'HomepageController@category');
    Route::get('/tag/{tag}' , 'HomepageController@tag');
    Route::get('/author/{author}' , 'HomepageController@author');
    Route::get('/blog' , 'HomepageController@blog');
    Route::get('/like/{id}' , 'HomepageController@likepost');
    Route::get('/view/{id}' , 'HomepageController@viewpost');
    Route::resource('page' , 'PagesController');
    Route::get('/about' , 'PagesController@about');
    Route::get('/contact' , 'PagesController@contact');

    Route::get('/', 'HomepageController@index');
    Route::get( '/postmin' , 'HomepageController@postmin')->name('postmin');
    Route::get( "/blog/{title}" , 'HomepageController@post');
    Route::post( "/comment/{id}" , 'CommentController@index')->name('comment');
    Route::get( "/commentslist" , 'CommentController@list')->name('comments.list');
    Route::get( "/commentcheck" , 'CommentController@check')->name('comments.check');
    Route::get( "/commentpublished" , 'CommentController@published')->name('comments.published');
    Route::get( "/commenttrash" , 'CommentController@trashed')->name('comments.trash');
    Route::get( "/commentdetail" , 'CommentController@detail')->name('comments.detail');
    Route::get( "/showcomment/{id}" , 'CommentController@show')->name('showcmnts');
    Route::get( "/displaycomment/{id}" , 'CommentController@display');
    Route::get( "/trashcomment/{id}" , 'CommentController@trash');
});
Auth::routes();
Route::group(['namespace'=>'Admin','middleware'=>['auth']],function () {

    Route::get('/setting','AdminController@index')->name('setting.index');
    Route::PUT('/info/{id}','AdminController@info')->name('setting.info');
    Route::PUT('/about/{id}','AdminController@about')->name('setting.about');
    Route::PUT('/resetpassword/{id}','AdminController@resetpassword')->name('setting.resetpassword');
    Route::get('/image/{id}/{image}','AdminController@image')->name('setting.image');
    Route::POST('/disable/{id}' , 'ManagmentController@disable')->name('disable');
    Route::resource('/product', 'ProductController')->middleware('seller');
    Route::get('/deletepic/{id}/{pid}', 'ProductController@deletepic')->middleware('seller')->name('del.pic');
    Route::resource('managment','ManagmentController')->middleware('managment');
    Route::resource('posts','PostController')->middleware('writer');
    Route::resource('productscat','ProductsCategoryController')->middleware('seller');
    Route::resource('postcat','PostCategoryController')->middleware('writer');
});
Route::get('/home', 'HomeController@index');
