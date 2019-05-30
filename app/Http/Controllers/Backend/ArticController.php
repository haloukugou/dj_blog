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
            foreach ($info as $k => $v) {
                $info[$k]['num'] = (($page-1) * $this->page_num ) + ($k + 1);
            }
        }
        return view('backend.artic.list', compact('info'));
    }

    public function articAdd(Request $request)
    {
        if($request->method() == 'POST'){

        }else{
            // 查询分类
            $classifyList = Classify::get();
            return view('backend.artic.add', compact('classifyList'));
        }
    }
}