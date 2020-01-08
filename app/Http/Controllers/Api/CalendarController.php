<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\CalendarDataRequest;
use App\Models\UserSetting;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Http\Controllers\Controller;
use App\Queries\CalendarDataQuery;
use Illuminate\Support\Facades\Auth;

class CalendarController extends Controller
{
    public function show($user_code)
    {
        $user_setting = UserSetting::where('user_code', $user_code)->first();
        if (empty($user_setting)) {
            abort(404);
        }
        return CalendarDataQuery::fetch($user_code);
    }
}
