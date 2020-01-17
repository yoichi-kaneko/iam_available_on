<?php

namespace App\Queries;

use App\Models\User;
use App\Models\UserSchedule;
use App\Models\UserSetting;

class WithdrawUserQuery
{
    public static function run($user_id)
    {
        UserSchedule::where('user_id', $user_id)->delete();
        UserSetting::where('user_id', $user_id)->delete();
        User::find($user_id)->delete();
    }

}
