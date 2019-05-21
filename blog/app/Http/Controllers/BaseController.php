<?php
/**
 * Created by PhpStorm.
 * User: tqg
 * Date: 2019-04-09
 * Time: 15:29
 */
namespace App\Http\Controllers;

class BaseController extends Controller
{
    /**
     *分页条数
     * @var int
     */
    protected $page_num = 20;

    /**
     * 返回失败
     * @param $msg
     * @return \Illuminate\Http\JsonResponse
     */
    public function returnError($msg, $data = [])
    {
        $data = [
            'code'=>0,
            'msg'=>$msg,
            'data'=>$data
        ];
        return response()->json($data);
    }

    /**返回成功
     * @param $msg
     * @return \Illuminate\Http\JsonResponse
     */
    public function returnSuccess($msg, $data = [])
    {
        $data = [
            'code'=>1,
            'msg'=>$msg,
            'data'=>$data
        ];
        return response()->json($data);
    }
}