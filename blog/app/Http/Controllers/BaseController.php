<?php
/**
 * Created by PhpStorm.
 * User: tqg
 * Date: 2019-04-09
 * Time: 15:29
 */
namespace App\Http\Controllers;

class BaseController
{
    /**
     * 返回失败
     * @param $msg
     * @return \Illuminate\Http\JsonResponse
     */
    public function returnError($msg)
    {
        $data = [
            'code'=>0,
            'msg'=>$msg
        ];
        return response()->json($data);
    }

    /**返回成功
     * @param $msg
     * @return \Illuminate\Http\JsonResponse
     */
    public function returnSuccess($msg)
    {
        $data = [
            'code'=>1,
            'msg'=>$msg
        ];
        return response()->json($data);
    }
}