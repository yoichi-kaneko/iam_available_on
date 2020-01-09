<?php

namespace App\Queries;

use App\Models\UserSetting;
use Illuminate\Support\Facades\Auth;

class UserInfoQuery
{
    /**
     * @param string $user_code 対象のユーザコード
     * @return array
     */
    public static function fetch($user_code)
    {
        $user_setting = UserSetting::where('user_code', $user_code)->first();
        if (empty($user_setting)) {
            return false;
        }
        return [
            'display_name' => $user_setting->display_name,
            'user_code' => $user_setting->user_code,
            'description' => $user_setting->description,
            'is_owner' => self::checkIsOwner($user_setting->user_id)
        ];
    }

    /**
     * アクセスしたユーザがオーナーであるか判定する
     * @param int $user_id
     * @return bool ログインユーザとアクセスページが一致していればtrue
     */
    private static function checkIsOwner($user_id)
    {
        $user = Auth::user();
        if (empty($user)) {
            return false;
        }
        return $user->id == $user_id;
    }
}
