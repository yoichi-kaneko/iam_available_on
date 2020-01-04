<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function index(Request $request)
    {
        $email   = $request->session()->get('email');

        if (empty($email)) {
            return redirect('/');
        }

        return view('register/index')->with(
            [
                'email' => $email
            ]
        );
    }
}
