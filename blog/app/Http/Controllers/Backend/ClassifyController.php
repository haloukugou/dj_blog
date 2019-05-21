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
//        dump($info);
        return view('backend.classify.index', compact('info'));
    }
}