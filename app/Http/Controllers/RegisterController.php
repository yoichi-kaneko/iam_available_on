<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
use Illuminate\Validation\Rule;

class RegisterController extends Controller
{
    public function index(Request $request)
    {
        $email   = $request->session()->get('email');

        if (empty($email)) {
            return redirect('/');
        }

        $input_data = array_merge(
            [
                'email' => $email,
                'encrypted' => User::encryptEmail($email)
            ],
            UserSetting::getDefaultValue()
        );

        return view('register/index')->with(['input_data' => $input_data]);
    }

    public function post(Request $request)
    {
        $post_data = $request->all();
        if(!User::checkEmail($post_data['email'], $post_data['encrypted'])) {
            abort('500');
        }
        // TODO: バリデーション失敗時の処理やこれを各場所などを整理する
        $validator = Validator::make($post_data, [
            'display_name' => 'required|max:16',
            'weekday_default_status' => ['required', Rule::in([1, 2, 3])],
            'holiday_default_status' => ['required', Rule::in([1, 2, 3])],
            'description' => 'max:200',
        ]);


        if ($validator->fails()) {
        //    return back()->withErrors($validator)->withInput();
          return view('register/index')->with(['input_data' => $post_data]);
        }


        $user = User::createByEmail($post_data['email']);
        UserSetting::createSetting($user->id, $post_data);
        \Auth::login($user, true);
        return redirect('/');
    }

}
