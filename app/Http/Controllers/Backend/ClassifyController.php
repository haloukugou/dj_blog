<?php
/**
 * Created by PhpStorm.
 * User: tqg
 * Date: 2019-04-12
 * Time: 11:15
 */

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\BaseController;
use App\Models\Classify;
use Illuminate\Http\Request;

class ClassifyController extends BaseController
{

    public function __construct()
    {
        view()->share('classify', 1);
    }

    public function classifyList(Request $request)
    {
        $info = Classify::paginate($this->page_num);
        if (!$info->isEmpty()) {
            $page = $info->currentPage();
            foreach ($info as $k => $v) {
                $info[$k]['num'] = (($page-1) * $this->page_num ) + ($k + 1);
            }
        }
        return view('backend.classify.index', compact('info'));
    }

    public function classifyAdd(Request $request)
    {
        if($request->method() == 'POST'){
            // 防重复添加相同数据
            $typeName = $request->only('name');
            if(!$typeName) return $this->returnError('请输入分类名称');
            $adminId = (auth()->user())['id'];

            // 查询是否有该数据存在
            $existWhere = [
                ['admin_id', '=', $adminId],
                ['type_name', '=', $typeName['name']]
            ];
            if(Classify::where($existWhere)->exists()) return $this->returnError('该分类已存在');

            // 添加数据
            $addData = [
                'admin_id'=>$adminId,
                'type_name'=>$typeName['name']
            ];

            try{
                Classify::insert($addData);
            }catch (\Exception $e){
                return $this->returnError($e->getMessage());
            }

            return $this->returnSuccess('添加成功');
        }else{
            return view('backend.classify.add');
        }
    }
}