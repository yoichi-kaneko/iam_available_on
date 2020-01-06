<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Illuminate\Support\Str;

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

    const STATUS_YES = '1';
    const USER_CODE_LENGTH = 8;

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public static function getDefaultValue()
    {
        return [
            'display_name' => '',
            'weekday_default_status' => self::STATUS_YES,
            'holiday_default_status' => self::STATUS_YES,
            'description' => ''
        ];
    }

    public static function createSetting($user_id, $settings)
    {
        $data = array_merge(
            [
                'user_id' => $user_id,
                'user_code' => self::makeUniqueUserCode()
            ],
            $settings
        );
        self::create($data);
    }

    private static function makeUniqueUserCode()
    {
        while (empty($ret)) {
            $random_string = Str::random(self::USER_CODE_LENGTH);
            $record = self::where('user_code', $random_string)->first();
            if(empty($record)) {
                $ret = $random_string;
            }
        }
        return $ret;
    }

}
