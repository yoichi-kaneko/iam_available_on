<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\UserSchedule
 *
 * @property int $id
 * @property int $user_id
 * @property string $date 日付
 * @property int $status その日の予定ステータス
 * @property string|null $comment 表示コメント
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserSchedule newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserSchedule newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserSchedule query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserSchedule whereComment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserSchedule whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserSchedule whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserSchedule whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserSchedule whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserSchedule whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserSchedule whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserSchedule whereUserId($value)
 * @mixin \Eloquent
 */
class UserSchedule extends Model
{
    protected $fillable = [
        'user_id',
        'date',
        'status',
        'comment',
    ];

     public static function getStatusList()
     {
         return [1, 2, 3];
     }
}
