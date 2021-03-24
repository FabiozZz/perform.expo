<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
Auth::routes();
Route::get('/admin', 'HomeController@index')->name('admin');

Route::resource('some', 'SomeController')->names('some');
Route::group([
    'namespace' => 'Admin',
    'middleware' => 'auth',
    'prefix' => 'admin',
], function () {

    Route::get('/home', 'HomeController@index')
        ->name('admin.home');
    /**
     * роуты для проектов
     */
    Route::get('/projects', 'ProjectController@index')
        ->name('admin.project.home');

    Route::get('/projects/{id}', 'ProjectController@one')
        ->name('admin.project.one');

    Route::post('/projects/{id}', 'ProjectController@addImageProject')
        ->name('admin.addImageProject');

    Route::get('/projects/{id}/edit', 'ProjectController@edit')
        ->name('admin.project.edit');

    Route::patch('/projects/{id}', 'ProjectController@update')
        ->name('admin.project.update');
    Route::post('/create_project', 'ProjectController@store')
        ->name('admin.project.store');

    Route::get('/create_project', 'ProjectController@create')
        ->name('admin.project.create');
    /**
     * роуты для постов
     */
    Route::get('/posts', 'PostController@index')
        ->name('admin.post.home');
    Route::get('/posts/{id}', 'PostController@one')
        ->name('admin.post.one');
    Route::get('/posts/{id}/edit', 'PostController@edit')
        ->name('admin.post.edit');
    Route::patch('/posts/{id}', 'PostController@update')
        ->name('admin.post.update');
    Route::post('/create_post', 'PostController@store')
        ->name('admin.post.store');

    Route::get('/create_post', 'PostController@create')
        ->name('admin.post.create');


});
Route::post('/projects/{id}', 'ImageController@deleteImageProject')->name('delete.image.project');

Route::get('/projects/{id}/changeImage', 'ImageController@viewChangeImage')->name('admin.changeImage.view');

Route::post('/projects/{id}/changeImage', 'ImageController@changeImage')->name('admin.changeImage.change');

Route::group(['namespace' => 'Home','prefix'=>'/'], function () {
    Route::get('/{slug}/{project:slug}', 'ProjectController@one')->name('home.one');
    Route::get('/architect', 'HomeController@getProjectsArchitect')->name('home.architect');
    Route::get('/design', 'HomeController@getProjectsDesign')->name('home.design');
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/blog', 'PostController@index')->name('blog');
    Route::get('/services', 'HomeController@services')->name('services');
    Route::get('/contacts', 'HomeController@contacts')->name('contacts');
    Route::get('/planning', 'HomeController@planning')->name('planning');
    Route::get('/planning', 'HomeController@planning')->name('planning');
    Route::get('/stages', 'HomeController@stages')->name('stages');
    Route::get('/private', 'HomeController@private')->name('private');
});
