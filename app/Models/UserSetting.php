<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserSetting extends Model
{
    protected $fillable = [
        'user_id',
        'display_name',
        'weekday_default_status',
        'holiday_default_status',
        'description',
    ];

    public static function createSetting($user_id, $settings)
    {
        // TODO: ランダム文字列の付与を追加する
        self::create(
            array_merge(['user_id' => $user_id], $settings)
        );
    }
}
