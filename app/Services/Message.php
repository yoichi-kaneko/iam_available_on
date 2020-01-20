<?php
namespace App\Services;

class Message
{
    public static function fetch($path, $params)
    {
        return view('messages/' . $path)->with($params);
    }
}
