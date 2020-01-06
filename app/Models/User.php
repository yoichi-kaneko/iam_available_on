<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\UserSetting;
use Illuminate\Support\Facades\Crypt;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function setting()
    {
        return $this->hasOne('App\Models\UserSetting');
    }

    /**
     * メールアドレスを暗号化する
     * @param $email メールアドレス
     * @return string 暗号化した文字列
     */
    public static function encryptEmail($email)
    {
        return Crypt::encryptString($email);
    }

    /**
     * メールアドレスと暗号文字列が一致するかチェックする
     * @param string $email メールアドレス
     * @param string $encrypted 暗号化文字列
     * @return bool メールアドレスの暗号値が第二引数と一致すればtrue
     */
    public static function checkEmail($email, $encrypted)
    {
        return Crypt::decryptString($encrypted) == $email;
    }

    public static function createByEmail($email)
    {
        $user = self::create([
            'email'    => $email,
        ]);
        return $user;
    }
}
