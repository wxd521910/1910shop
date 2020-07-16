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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::any('/', 'Index\LoginController@login');                          //登陆首页

// 登陆
Route::prefix('login')->group(function(){
    Route::any('add','Index\LoginController@add');                      //执行登陆
    Route::any('sign','Index\LoginController@sign');                    //注册视图
    Route::any('signAdd','Index\LoginController@signAdd');              //执行注册
    Route::any('logout','Index\LoginController@logout');              //退出
}); 

// 前台首页
Route::prefix('index')->middleware('checkLogin')->group(function(){
    Route::any('index','Index\IndexController@index');                  //前台首页
    Route::any('UserInfo','Index\IndexController@UserInfo');                  //个人中心
}); 
