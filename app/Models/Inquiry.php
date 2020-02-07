<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Inquiry
 *
 * @property int $id
 * @property string $name ユーザー名
 * @property string $mail メールアドレス
 * @property string|null $text 本文
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Inquiry newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Inquiry newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Inquiry query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Inquiry whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Inquiry whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Inquiry whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Inquiry whereDisplayName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Inquiry whereHolidayDefaultStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Inquiry whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Inquiry whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Inquiry whereUserCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Inquiry whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Inquiry whereWeekdayDefaultStatus($value)
 * @mixin \Eloquent
 */
class Inquiry extends Model
{
    protected $fillable = [
        'name',
        'mail',
        'text',
    ];

    public static function getDefaultValue()
    {
        return [
            'name' => '',
            'mail' => '',
            'text' => '',
        ];
    }

    public static function saveInquiry($data)
    {
        $model = self::create($data);
        return true;
    }
}
