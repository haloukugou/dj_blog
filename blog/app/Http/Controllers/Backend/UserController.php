<?php
/**
 * Created by PhpStorm.
 * User: tqg
 * Date: 2019-04-10
 * Time: 14:51
 */
namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //每页数据量
    protected $page_num = 20;

    public function userIndex(Request $request)
    {
        //查询用户列表
        $info = Admin::select(['id', 'account', 'salt', 'login_time', 'login_ip'])->paginate($this->page_num);
//        dump($info);
        return view('backend.user.index', compact('info'));
    }
}