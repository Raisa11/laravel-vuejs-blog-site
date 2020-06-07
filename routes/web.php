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
    return view('public/index');
});
Route::get('/all-blogs','BlogController@getAllBlog');
Route::get('/single-blog/{id}','BlogController@getSingleBlog');
Route::get('all-categories','BlogController@allCategories');
Route::get('/category-blogs/{id}','BlogController@getCategoryBlogs');

Route::get('/search','BlogController@searchBlog');
Route::post('/add-comment','BlogController@addComment');
Route::post('/add-reply','BlogController@addReply');

Route::get('public-register','PublicController@index');
Route::post('public-register','PublicController@register');
Route::get('public-register/confirmation/{token}','PublicController@registerConfirmation');
Route::get('public-login','PublicController@login');
Route::post('public-login','PublicController@loginCheck');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



Route::resource('/user','UserController')->middleware('super');


Route::resource('admin-category','AdminCategoryController');
Route::resource('admin-blog','AdminBlogController');
Route::middleware(['admin'])->group(function(){

    Route::get('admin-blog/unpublish/{id}','AdminBlogController@unpublishedBlog');
    Route::get('admin-blog/publish/{id}','AdminBlogController@publishedBlog');

});
Route::middleware(['super'])->group(function(){

    Route::get('admin-blog/unpublish/{id}','AdminBlogController@unpublishedBlog');
    Route::get('admin-blog/publish/{id}','AdminBlogController@publishedBlog');

});

Route::get('/registered-user','RegisterUserController@registeredUsers');
Route::get('/registered-user/export','RegisterUserController@export');






