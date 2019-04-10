<?php
/**
 * Created by PhpStorm.
 * User: tqg
 * Date: 2019-04-10
 * Time: 14:51
 */
namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function userIndex(Request $request)
    {
        return view('backend.user.index');
    }
}