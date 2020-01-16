<?php

namespace App\Http\Controllers\Api;
use App\Http\Requests\UpdateUserSchedule;
use App\Http\Controllers\Controller;
use App\Queries\UpdateScheduleQuery;

class CalendarScheduleController extends Controller
{
    public function post(UpdateUserSchedule $request)
    {
        $post_data = $request->all();
        $schedule =  UpdateScheduleQuery::run($post_data);

        if (empty($schedule)) {
            abort(500);
        }
        return [
            'id' => $schedule->id,
            'status' => $schedule->status,
            'comment' => $schedule->comment
        ];
    }
}
