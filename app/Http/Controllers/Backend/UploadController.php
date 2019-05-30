<?php
/**
 * Created by PhpStorm.
 * User: tqg
 * Date: 2019-05-27
 * Time: 13:48
 */
namespace App\Http\Controllers\Backend;

use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;

class UploadController extends BaseController
{


    public function upload(Request $request)
    {
//        {
//            success : 0 | 1,           // 0 表示上传失败，1 表示上传成功
//            message : "提示的信息，上传成功或上传失败及错误信息等。",
//            url     : "图片地址"        // 上传成功时才返回
//         }
        return $request->json(['success'=>1,'url'=>'www.baidu.com','message'=>'test']);
    }

}