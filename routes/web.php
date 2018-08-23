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

//Route::get('/', function () {
//    return view('welcome');
//});

//Route::get("/jack","\App\Http\Controllers\JackController@index");
Route::get("/jack","\App\Http\Controllers\JackController@index")->middleware("jack");
Route::get("/","PagesController@root")->name("root");
//Route::get("/test",function(){
//    return 'hello';
//});
//Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

//Auth::routes() ==以下所有的路由
// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');

Route::resource("users","UsersController",['only'=>['show','edit','update']]);
/**
Route::get("users/{user}/show","userscontroller@show")->name("user.show");
Route::get("users/{user}/edit","userscontroller@edit")->name("user.edit");
Route::patch("users/{user}/update","userscontroller@update")->name("user.update");
route("user.show",[$user])
route("user.edit",[$user])
route("user.update",[$user]);
 **/

Route::get("topics/create",function(){

});
Route::post("/topics/store",function(){

});
Route::get("/topics",function(){

});

Route::post("upload_image",'TopicsController@upload_image')->name("topics.upload_image");
Route::get("topics/{topic}/{slug?}","TopicsController@show")->name("topics.show");
//Route::resource('topics', 'TopicsController', ['only' => ['index', 'show', 'create', 'store', 'update', 'edit', 'destroy']]);
Route::resource('topics', 'TopicsController', ['only' => ['index', 'create', 'store', 'update', 'edit', 'destroy']]);

Route::resource("categories","CategoriesController",['only'=>['show']]);


//Route::resource('replays', 'ReplaysController', ['only' => ['index', 'show', 'create', 'store', 'update', 'edit', 'destroy']]);
Route::resource('replays', 'ReplaysController', ['only' => ['store','destroy']]);