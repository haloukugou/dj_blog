<?php
/**
 * Created by PhpStorm.
 * User: tqg
 * Date: 2019-03-30
 * Time: 15:10
 */

if(!function_exists('make_pwd')){
    /**
     * 生成密码
     * @param $salt
     * @param $pwd
     * @return string
     */
    function make_pwd($salt, $pwd)
    {
        return md5($salt.$pwd);
    }
}

if(!function_exists('salt')){
    /**
     * 返回随机数盐
     * @return int
     */
    function salt()
    {
        return rand(1000, 9999);
    }
}

if(!function_exists('check_pwd')){
    /**
     * 比较密码
     * @param $salt
     * @param $pwd
     * @param $db_pwd
     * @return bool
     */
    function check_pwd($salt, $pwd, $db_pwd)
    {
        return (make_pwd($salt, $pwd)) == $db_pwd;
    }
}

