<?php
/**
 * Created by PhpStorm.
 * User: tqg
 * Date: 2019-03-30
 * Time: 11:44
 */

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Models\Admin;

class LoginController extends Controller
{
    /**
     * 登录页
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        return view('backend.login.index');
    }

    /**
     * 登录
     * @param Request $request
     */
    public function loginIn(Request $request)
    {
        $data = ['code' => 0];
        $input = $request->all();
        if (empty($input['account'])) {
            $data['msg'] = '输入账号';
            return response()->json($data);
        }
        if (empty($input['password'])) {
            $data['msg'] = '输入密码';
            return response()->json($data);
        }
        if(empty($input['code'])){
            $data['msg'] = '输入验证码';
            return response()->json($data);
        }
        $rule = [
            'code' => 'required|captcha'
        ];
        $validator = Validator::make($input, $rule);
        if ($validator->fails()) {
           $data['msg'] = '验证码错误';
           return response()->json($data);
        }

        //查询用户是否存在
        $info = Admin::where('account', $input['account'])->first();
        if(!$info){
            $data['msg'] = '不存在';
            return response()->json($data);
        }
//        dd($info);
        $pwd = make_pwd($info['salt'], $input['password']);
        if($pwd != $info['password']){
            $data['msg'] = '密码错误';
            return response()->json($data);
        }
        unset($input['password']);
        session('dj', $input);
        $data = [
            'code'=>1,
            'msg' => '登录成功'
        ];
        return response()->json($data);
    }

    /**
     * 退出登录
     * @param Request $request
     */
    public function loginOut(Request $request)
    {

    }
}