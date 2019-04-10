<?php
/**
 * Created by PhpStorm.
 * User: tqg
 * Date: 2019-03-30
 * Time: 11:44
 */

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\BaseController;

class LoginController extends BaseController
{
    /**
     * 登录页
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('backend.login.index');
    }

}