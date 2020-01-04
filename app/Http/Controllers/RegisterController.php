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

        // TODO: emailの渡し方で改竄対策されていないので、これの対策を行う
        return view('register/index')->with(
            [
                'email' => $email
            ]
        );
    }

    public function post(Request $request)
    {
        // TODO: バリデーション失敗時の処理やこれを各場所などを整理する
        $validator = Validator::make($request->all(), [
            'display_name' => 'required|max:16',
            'weekday_default_status' => ['required', Rule::in([1, 2, 3])],
            'holiday_default_status' => ['required', Rule::in([1, 2, 3])],
            'description' => 'max:200',
        ]);


        //if ($validator->fails()) {
        //    return back()->withErrors($validator)->withInput();
        //}
        $post_data = $request->all();

        $user = User::createByEmail($post_data['email']);
        UserSetting::createSetting($user->id, $post_data);
        \Auth::login($user, true);
        return redirect('/');
    }

}
