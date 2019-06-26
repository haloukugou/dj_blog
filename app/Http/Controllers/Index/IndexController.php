<?php
/**
 * Created by PhpStorm.
 * User: tqg
 * Date: 2019-03-30
 * Time: 10:21
 */
namespace App\Http\Controllers\Index;



use App\Http\Controllers\Controller;
use App\Models\Artic;
use App\Models\Classify;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    /**
     * 首页
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        // 查询文章
        $articList = Artic::leftJoin('classify as c', 'classify_id', '=', 'c.id')->select(['c.type_name','artic.*'])->paginate(20);

        return view('index.index', compact('articList'));
    }

    public function detail(Request $request)
    {
        $input = $request->only('id');
        if(!$input){
            redirect('index');
        }
        // 查询文章
        $articInfo = Artic::where('id', $input['id'])->first();
        if(is_null($articInfo)){
            redirect('index');
        }

        // 查询类型
        $classifyInfo = Classify::where('id', $articInfo->classify_id)->first();
        $articInfo->classify_name = $classifyInfo->type_name;
        return view('index.detail', compact('articInfo'));
    }
}