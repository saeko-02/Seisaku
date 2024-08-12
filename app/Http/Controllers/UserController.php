<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
        /**
    *一覧
    *
    * @param Request $request
    * @return Response
    */

    public function index(Request $request)
    {
        $users = User::all();
        return view('users.index', [
            'users' => $users,
        ]);
    }
}
