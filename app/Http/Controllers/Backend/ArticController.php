<?php
/**
 * Created by PhpStorm.
 * User: tqg
 * Date: 2019-05-27
 * Time: 13:48
 */
namespace App\Http\Controllers\Backend;

use App\Http\Controllers\BaseController;
use App\Models\Artic;
use App\Models\Classify;
use Illuminate\Http\Request;
use Mockery\Exception;

class ArticController extends BaseController
{
    public function __construct()
    {
        view()->share('artic', 1);
    }

    public function articList(Request $request)
    {
        $info = Artic::paginate($this->page_num);
        if (!$info->isEmpty()) {
            $page = $info->currentPage();
            $classify = $this->getClassify();
            dd($classify);
            foreach ($info as $k => $v) {
                $info[$k]['num'] = (($page-1) * $this->page_num ) + ($k + 1);
                $info[$k]['type_name'] = $classify[$v['classify_id']]['type_name'];
            }
        }
        return view('backend.artic.list', compact('info'));
    }

    public function articAdd(Request $request)
    {
        if($request->method() == 'POST'){
            $input = $request->all();
            $result = $this->saveAction($input);
            if(!$result) return $this->returnError('新增失败');
            return $this->returnSuccess('新增成功');
        }else{
            // 查询分类
            $classifyList = Classify::get();
            return view('backend.artic.add', compact('classifyList'));
        }
    }

    public function edit(Request $request)
    {
        if($request->method()=='POST'){
            $input = $request->all();
            $id = $input['id'];
            unset($input['id']);
            $result = $this->saveAction($input, $id);
            if(!$result) return $this->returnError('编辑失败');
            return $this->returnSuccess('编辑成功');
        }else{
            // 查询文章信息
            $input = $request->only(['id']);
            $articInfo = Artic::where('id', $input['id'])->first();
            // 查询分类信息
            $classifyList = Classify::get();
            return view('backend.artic.edit', compact(['articInfo','classifyList']));
        }
    }

    protected function saveAction($input,$id='')
    {
        if(!$input['title']) return $this->returnError('请填写标题');
        if(!$input['classify']) return $this->returnError('请选择分类');
        if(!$input['description']) return $this->returnError('请填写描述');
        if(!$input['content']) return $this->returnError('请填写内容');
        if(empty($id)){
            // 添加数据
            $addData = [
                'classify_id'=>$input['classify'],
                'title'=>$input['title'],
                'description'=>$input['description'],
                'content'=>$input['content'],
                'admin_id'=>(auth()->user())['id'],
                'create_at'=>date('Y-m-d H:i:s')
            ];
            try{
                Artic::insert($addData);
            }catch (Exception $e){
                return false;
            }
        }else{
            // 修改数据
            $saveData = [
                'classify_id'=>$input['classify'],
                'title'=>$input['title'],
                'description'=>$input['description'],
                'content'=>$input['content'],
                'update_at'=>date('Y-m-d H:i:s')
            ];
            try{
                Artic::where('id', $id)->update($saveData);
            }catch (Exception $e){
                return false;
            }
        }
        return true;
    }

    protected function getClassify()
    {
        $result = Classify::select(['id', 'type_name'])->get();
        if($result->isEmpty()){
           return [];
        }
        $result = $result->toArray();
        dd($result);
        $result = array_column($result, '', 'id');
        dd(2);
        return $result;
    }
}