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
//后台登录
Route::get('/adminlogin','Admin\AdminController@login');
Route::post('/admindologin','Admin\AdminController@dologin');
Route::get('/adminloginout','Admin\AdminController@loginout');
// 中间件
Route::group(['middleware'=>'adminlogin'],function(){
	//后台首页路由
	Route::get('/admin','Admin\AdminController@index');
	//管理员管理
	Route::resource('/adminusers','Admin\AdminuserController');
	//角色管理
	Route::resource('/adminroles','Admin\RoleController');
	//权限管理
	Route::resource('/adminauths','Admin\AuthController');
	//分配权限
	Route::get('/adminauth/{id}','Admin\RoleController@auth');
	Route::post('/saveauth/{uid}','Admin\RoleController@saveauth');
	//分配角色
	Route::get('/adminrole/{id}','Admin\AdminuserController@role');
	Route::post('/saverole/{uid}','Admin\AdminuserController@saverole');
	//分类管理和批量删除
	Route::resource('/adminclassify','Admin\ClassifyController');
	Route::get('/classifydel','Admin\ClassifyController@del');
	//会员管理
	Route::resource('/adminuser','Admin\UserController');
	//ajax通过开关修改表格内容---状态
	Route::get('/changestatus','Admin\AdminController@status');
});

//前台
//登录
Route::resource('/login','Home\LoginController');
//前台首页
Route::resource('/','Home\IndexController');
Route::group(['middleware'=>'login'],function(){
	//个人中心
	Route::resource('/myaccount','Home\MyController');
	//购物车
	Route::resource('/mycart','Home\CartController');
	//收藏夹
	Route::resource('/mywish','Home\WishController');
});
