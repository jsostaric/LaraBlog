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



//Authentication routes


//Route::get("auth/login", "Auth\LoginController@showLoginForm");
//Route::post("auth/login", "Auth\LoginController@postLogin");
Route::get("logout", "Auth\LoginController@logout");

//registration routes
//Route::get("auth/register", "Auth\RegisterController@showRegistrationForm");
//Route::post("auth/register", "Auth\RegisterController@postRegister");

//Categories
Route::resource("categories", "CategoryController", array("except" => array("create")));
Route::resource("tags", "TagController", array("except" => array("create")));

// Comments
Route::post("comments/{post_id}", array(
	"uses" => "CommentsController@store",
	"as" => "comments.store"
));


Route::get("blog/{slug}", array(
			"as" => "blog.single",
			"uses" => "BlogController@getSingle"
			))->where("slug", "[\w\d\-\_]+");

Route::get("blog", array(
	"as" => "blog.index",
	"uses" =>"BlogController@getIndex"
));

Route::get("contact", "PageController@getContact");
Route::post("contact", "PageController@postContact");

Route::get("about", "PageController@getAbout");

Route::get("/", "PageController@getIndex");

Route::resource("posts", "PostController");

Auth::routes();

//Route::get('/', 'HomeController@index');
