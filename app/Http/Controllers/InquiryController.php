<?php

namespace App\Http\Controllers;

use App\Http\Requests\SendInquiry;

use App\Models\Inquiry;
use App\Notifications\InquiryNotification;
use Illuminate\Http\Request;

class InquiryController extends Controller
{
    public function index(Request $request)
    {
        $old_input = $request->session()->get('_old_input');
        if (empty($old_input)) {
            $input_data = Inquiry::getDefaultValue();
        } else {
            $input_data = $old_input;
        }

        return view('inquiry/index')->with(['input_data' => $input_data]);
    }

    public function post(SendInquiry $request)
    {
        $post_data = $request->all();
        InquiryNotification::send($post_data);
        Inquiry::saveInquiry($post_data);

        return redirect('/')->with(['message' => '問い合わせを送信しました']);
    }

}
