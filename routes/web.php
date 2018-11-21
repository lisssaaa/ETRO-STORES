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
	//订单管理
	Route::resource('/adminorder','Admin\OrderController');
	//管理
	
});

//前台
//登录
Route::resource('/login','Home\LoginController');
//校验码
Route::get('/code','Home\LoginController@code');
//邮箱激活
Route::get('/jihuo','Home\LoginController@jihuo');
//前台首页
Route::resource('/','Home\IndexController');
//商品列表
Route::resource('/shop','Home\ShopController');
Route::group(['middleware'=>'login'],function(){	
	//个人中心
	Route::resource('/myaccount','Home\MyController');

	//付款
	Route::get('/pay','Home\ShopController@orderpay');
	Route::get('/returnurl/{data}','Home\ShopController@returnurl');
	//确认收货
	Route::get('/confirm/{oid}','Home\ShopController@confirm');
	//去评价
	Route::get('/comment/{oid}','Home\ShopController@comment');

	//收货地址
	Route::resource('/myaddress','Home\AddressController');
	//ajax城市级联
	Route::get('/city','Home\AddressController@city');
	//购物车
	Route::resource('/mycart','Home\CartController');
	Route::get('/cartdel','Home/CartController@del');
	//收藏夹
	Route::resource('/mywish','Home\WishController');
	Route::get('/wishdel','Home/WishController@del');
});
