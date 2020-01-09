<?php

namespace App\Http\Controllers\Api;
use App\Http\Requests\UpdateUserSchedule;
use App\Http\Controllers\Controller;
use App\Models\UserSchedule;

class CalendarScheduleController extends Controller
{
    public function post(UpdateUserSchedule $request)
    {
        // TODO: 条件判定をいれる
        $post_data = $request->all();
        $schedule =  UserSchedule::updateSchedule($post_data);
        return [
            'id' => $schedule->id,
            'status' => $schedule->status,
            'comment' => $schedule->comment
        ];
    }
}
