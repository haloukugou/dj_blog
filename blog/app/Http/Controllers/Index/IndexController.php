<?php
/**
 * Created by PhpStorm.
 * User: tqg
 * Date: 2019-03-30
 * Time: 10:21
 */
namespace App\Http\Controllers\Index;



use App\Http\Controllers\Controller;
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
        echo php_sapi_name();
        die;
        return view('index.index');
    }

    public function details(Request $request)
    {
        $input = $request->only('id');
        if(!$input){
            redirect('index');
        }

    }
}