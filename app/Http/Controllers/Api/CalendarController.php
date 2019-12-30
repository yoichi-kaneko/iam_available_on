<?php

namespace App\Http\Controllers\Api;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Queries\CalendarDataQuery;
use Illuminate\Support\Facades\Auth;

class CalendarController extends BaseController
{
    public function show($user_code)
    {
        return CalendarDataQuery::fetch($user_code);
    }
}
