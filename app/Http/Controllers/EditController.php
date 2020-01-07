<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserSetting;

use App\Models\UserSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EditController extends Controller
{
    public function index(Request $request)
    {
        if (!$request->is_login) {
            return redirect('/');
        }
        $old_input = $request->session()->get('_old_input');
        if (empty($old_input)) {
            $setting = Auth::user()->setting;
            $input_data = $setting->toArray();
        } else {
            $input_data = $old_input;
        }
        $input_data['email'] = Auth::user()->email;

        return view('edit/index')->with(['input_data' => $input_data]);
    }

    public function post(UpdateUserSetting $request)
    {
        if (!$request->is_login) {
            return redirect('/');
        }
        $post_data = $request->all();
        UserSetting::updateSetting(Auth::user()->id, $post_data);

        return redirect('/calendar/' . Auth::user()->setting->user_code);
    }
}
