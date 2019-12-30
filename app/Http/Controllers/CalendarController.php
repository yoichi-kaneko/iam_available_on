<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;

class CalendarController extends Controller
{
    public function show($user_code)
    {
        return view('calendar/show')->with(
            [
                'is_logined' => $this->is_logined(),
                'user_code' => $user_code
            ]
        );
    }
}
