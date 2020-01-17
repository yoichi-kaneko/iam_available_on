<?php

namespace App\Http\Controllers;

use App\Http\Requests\WithdrawUser;
use App\Queries\WithdrawUserQuery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WithdrawController extends Controller
{
    public function index(Request $request)
    {
        if (!$request->is_login) {
            return redirect('/');
        }

        return view('withdraw/index');
    }

    public function post(WithdrawUser $request)
    {
        if (!$request->is_login) {
            return redirect('/');
        }
        WithdrawUserQuery::run(Auth::user()->id);

        Auth::logout();
        return redirect('/')->with(['message' => '退会しました']);
    }
}
