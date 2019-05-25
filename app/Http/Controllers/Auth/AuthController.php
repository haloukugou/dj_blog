<?php
/**
 * Created by PhpStorm.
 * User: tqg
 * Date: 2019-04-09
 * Time: 16:31
 */
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\BaseController;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class AuthController extends BaseController
{
    use AuthenticatesUsers;

    protected $redirectTo = '/';

    /**
     * 登录操作
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function signIn(Request $request)
    {
        $input = $request->all();
        if (empty($input['account'])) {
            return $this->returnError('输入账号');
        }
        if (empty($input['password'])) {
            return $this->returnError('输入密码');
        }
        if(empty($input['code'])){
            return $this->returnError('输入验证码');
        }
        $rule = [
            'code' => 'required|captcha'
        ];
        $validator = Validator::make($input, $rule);
        if ($validator->fails()) {
            return $this->returnError('验证码错误');
        }

        //查询用户是否存在
        $info = Admin::where('account', $input['account'])->first();
        if(!$info){
            return $this->returnError('不存在');
        }

        $pwd = make_pwd($info['salt'], $input['password']);
        if($pwd != $info['password']){
            return $this->returnError('密码错误');
        }

        //修改登录信息
        $edit_data = [
            'login_time'=>date('Y-m-d H:i:s'),
            'login_ip'=>$request->getClientIp()
        ];
        Admin::where('id', $info['id'])->update($edit_data);
        unset($info['password']);

        auth()->login($info);

        return $this->returnSuccess('登录成功');
    }

    /**
     * 退出登录
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function signOut(Request $request)
    {
        $this->guard()->logout();
        $request->session()->invalidate();
        return $this->returnSuccess('退出成功');
    }
}