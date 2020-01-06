<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class UserSetting extends Model
{
    protected $fillable = [
        'user_id',
        'user_code',
        'display_name',
        'weekday_default_status',
        'holiday_default_status',
        'description',
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public static function createSetting($user_id, $settings)
    {
        // TODO: ランダム文字列の付与を追加する
        self::create(
            array_merge(['user_id' => $user_id], $settings)
        );
    }

    private static function 

}
