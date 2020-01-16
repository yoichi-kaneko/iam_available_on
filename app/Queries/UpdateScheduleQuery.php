<?php

namespace App\Queries;

use App\Models\UserSchedule;
use Illuminate\Support\Facades\Auth;

class UpdateScheduleQuery
{
        public static function run($data)
        {
            $user = Auth::user();

            if (empty($user)) {
                return false;
            }

            $user_schedule = UserSchedule::find($data['id']);
            if(empty($user_schedule) || $user->id != $user_schedule->user_id) {
                return false;
            }
            $user_schedule->comment = $data['comment'];
            $user_schedule->status = $data['status'];
            $user_schedule->save();
            return $user_schedule;
        }
}
