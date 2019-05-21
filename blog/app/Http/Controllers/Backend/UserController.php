<?php
/**
 * Created by PhpStorm.
 * User: tqg
 * Date: 2019-04-10
 * Time: 14:51
 */
namespace App\Http\Controllers\Backend;

use App\Http\Controllers\BaseController;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class UserController extends BaseController
{
    use AuthenticatesUsers;

    public function __construct()
    {
        view()->share('user', 1);
    }

    /**
     * 用户列表
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function userIndex(Request $request)
    {
        //查询用户列表
        $info = Admin::select(['id', 'account', 'salt', 'login_time', 'login_ip'])->paginate($this->page_num);

        return view('backend.user.index', compact('info'));
    }

    /**
     * 查看信息
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function setInfo(Request $request)
    {
        $user_id = auth()->user()->id;

        //查询管理员信息
        $info = Admin::where('id', $user_id)->first();

        return view('backend.user.edit', compact('info'));
    }

    /**
     * 编辑信息
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function edit(Request $request)
    {
        $input = $request->all();
        $user_id = auth()->user()->id;
        $save_data = [];
        if(empty($input['account'])) return $this->returnError('请输入账号');
        if(!empty($input['pwd']) && !empty($input['rpwd'])){
            $reg = "/^[a-zA-Z\d_]{6,}$/";
            if($input['pwd'] != $input['rpwd']){
                return $this->returnError('两次输入的密码不一致');
            }
            if(!preg_match($reg, $input['pwd']) || !preg_match($reg, $input['rpwd'])){
                return $this->returnError('密码不符合');
            }
            $new_salt = salt();
            $new_pwd = make_pwd($new_salt, $input['pwd']);
            $save_data['salt'] = $new_salt;
            $save_data['password'] = $new_pwd;
        }
        $save_data['account'] = $input['account'];
        try{
            Admin::where('id', $user_id)->update($save_data);
        }catch (\Exception $e){
            return $this->returnError('编辑失败');
        }
        $this->guard()->logout();
        $request->session()->invalidate();
        return $this->returnSuccess('请重新登录');
    }
}