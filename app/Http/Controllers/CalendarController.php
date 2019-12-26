<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class CalendarController extends BaseController
{
    public function show($user_code)
    {
        return view('calendar/show')->with(['user_code' => $user_code]);
    }
}
