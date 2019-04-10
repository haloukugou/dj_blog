<?php
/**
 * Created by PhpStorm.
 * User: tqg
 * Date: 2019-03-30
 * Time: 11:44
 */
namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function index()
    {
        return view('backend.index.index');
    }
}