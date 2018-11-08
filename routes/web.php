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
    return view('welcome');
});

//后台登录
Route::get('/adminlogin','Admin\AdminController@login');
Route::post('/admindologin','Admin\AdminController@dologin');

// 中间件'middleware'=>'adminlogin'
Route::group([],function(){
	//后台首页路由
	Route::get('/admin','Admin\AdminController@index');
	//管理员管理
	Route::resource('/adminusers','Admin\AdminuserController');
	//分类路由
	Route::resource('/adminclassify','Admin\ClassifyController');

});
