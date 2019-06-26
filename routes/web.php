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
    // 基础页面
    $router->get('/', 'IndexController@index');
    // 文章详情
    $router->get('articDetail', 'IndexController@detail')->name('articDetail');
});

$router->group(['namespace'=>'Backend'], function($router){
    //登录页面
    $router->get('dj', 'LoginController@index');
});

$router->group(['namespace'=>'Auth'], function($router){
    //登录
    $router->post('signIn', 'AuthController@signIn');
    //退出登录
    $router->post('signOut', 'AuthController@signOut');
});

$router->group(['middleware' => 'islogin'], function ($router) {

    $router->group(['namespace' => 'Backend'], function ($router) {
        //后台首页
        $router->get('djIndex', 'IndexController@index');
        //用户首页
        $router->get('userIndex', 'UserController@userIndex');
        //查看自己的信息
        $router->get('setInfo', 'UserController@setInfo');
        //编辑信息
        $router->post('editInfo', 'UserController@edit');
        //分类列表
        $router->get('classifyList', 'ClassifyController@classifyList');
        // 添加分类
        $router->any('classifyAdd', 'ClassifyController@classifyAdd');

        // 文章列表
        $router->get('articList', 'ArticController@articList')->name('articList');
        // 添加文章
        $router->any('articAdd', 'ArticController@articAdd')->name('articAdd');
        // 编辑文章
        $router->any('articEdit', 'ArticController@edit')->name('articEdit');
    });
});