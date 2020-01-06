<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserSetting;
use App\Http\Requests\CreateUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;

class RegisterController extends Controller
{
    public function index(Request $request)
    {
        $old_input = $request->session()->get('_old_input');
        if (empty($old_input)) {
            $email   = $request->session()->get('email');
            $input_data = array_merge(
                [
                    'email' => $email,
                    'encrypted' => User::encryptEmail($email)
                ],
                UserSetting::getDefaultValue()
            );
        } else {
            $email = $old_input['email'];
            $input_data = $old_input;
        }

        if (empty($email)) {
            return redirect('/');
        }

        return view('register/index')->with(['input_data' => $input_data]);
    }

    public function post(CreateUser $request)
    {
        $post_data = $request->all();
        if(!User::checkEmail($post_data['email'], $post_data['encrypted'])) {
            abort('500');
        }
        $this->validate($request, UserSetting::getValidateRule());

        $user = User::createByEmail($post_data['email']);
        UserSetting::createSetting($user->id, $post_data);
        \Auth::login($user, true);
        return redirect('/');
    }

}
