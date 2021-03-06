<?php
use App\Category;

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

Route::get('/', 'PostsController@index');
/* Route::get('/posts/create' , 'PostsController@create');
Route::post('/posts', 'PostsController@store');
Route::get('/posts/{post}' , 'PostsController@show');

Route::get('posts/{post}/edit' , 'PostsController@edit');
Route::post('posts/{post}' , 'PostsController@update'); */

Route::resource('posts', 'PostsController');

Route::post('/posts/{post}/comments' , 'CommentController@store');

Route::get('/categories/{category}' , 'CategoriesController@show' );
Route::get('/tags/{tag}' , 'TagController@show' );


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::any('/search', 'SearchController@index');


Route::get('/about', function() {
    $categories = Category::all();
    return view('about', compact('categories'));
});

Route::get('/contacts', function() {
    $categories = Category::all();
    return view('contacts', compact('categories'));
});
