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

$router->group(['namespace' => 'Index'], function ($router) {
    $router->get('/', 'IndexController@index'); //基础页面
});

$router->group(['namespace' => 'Backend'], function ($router) {
    //登录页面
    $router->get('dj', 'LoginController@index');
    //登录
    $router->post('loginIn', 'LoginController@loginIn');

});