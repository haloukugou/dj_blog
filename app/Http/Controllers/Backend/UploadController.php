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
use Illuminate\Support\Facades\Storage;

class UploadController extends BaseController
{


    public function upload(Request $request)
    {
        $file = $request->file('editormd-image-file');
        if($file->isValid()){
            //原文件名
//            $originalName = $file->getClientOriginalName();
            //扩展名
            $ext = $file->getClientOriginalExtension();
            //MimeType
//            $type = $file->getClientMimeType();
            //临时绝对路径
            $realPath = $file->getRealPath();
            $filename = uniqid().'.'.$ext;

            $bool = Storage::disk('local')->put($filename,file_get_contents($realPath));
            if($bool){
                // 获取上传路径
                $path = config('filesystems.disks.local.root');
                // 组装图片的绝对路径
                $filePath = $path.'/'.$filename;

                $data = [
                    'success'=>1,
                    'url'=>$filePath
                ];
                return response()->json($data);
            }else{
                $data = [
                    'success'=>0,
                    'message'=>'上传图片失败'
                ];
                return response()->json($data);
            }
        }
    }

}