<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

/**
 * App\Models\UserSetting
 *
 * @property int $id
 * @property int $user_id
 * @property string $user_code ユーザーコード
 * @property string $display_name 表示名
 * @property int $weekday_default_status 平日のデフォルトステータス
 * @property int $holiday_default_status 休日のデフォルトステータス
 * @property string|null $description 説明文
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserSetting newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserSetting newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserSetting query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserSetting whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserSetting whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserSetting whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserSetting whereDisplayName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserSetting whereHolidayDefaultStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserSetting whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserSetting whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserSetting whereUserCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserSetting whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserSetting whereWeekdayDefaultStatus($value)
 * @mixin \Eloquent
 */
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
        return self::create($data);
    }

    public static function updateSetting($user_id, $settings)
    {
        $setting = self::where('user_id', $user_id)->first();
        $setting->display_name = $settings['display_name'];
        $setting->weekday_default_status = $settings['weekday_default_status'];
        $setting->holiday_default_status = $settings['holiday_default_status'];
        $setting->description = $settings['description'];
        return $setting->save();
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
