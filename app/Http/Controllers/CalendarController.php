<?php

namespace App\Http\Controllers;

use App\Models\UserSetting;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CalendarController extends Controller
{
    public function show($user_code)
    {
        $user_setting = UserSetting::where('user_code', $user_code)->first();
        if (empty($user_setting)) {
            abort(404);
        }
        return view('calendar/show')->with(
            [
                'user_code' => $user_code
            ]
        );
    }

    public function me(Request $request)
    {
        if (!$request->is_login) {
            return redirect('/');
        }
        $setting = Auth::user()->setting;
        return redirect('/calendar/' . $setting->user_code);
    }
}
