<?php

namespace App\Http\Controllers;

use App\Http\Requests\SendInquiry;

use App\Models\Inquiry;
use App\Services\Line;
use App\Services\Message;
use Illuminate\Http\Request;

class InquiryController extends Controller
{
    public function index(Request $request)
    {
        $old_input = $request->session()->get('_old_input');
        if (empty($old_input)) {
            $input_data = $setting->toArray();
        } else {
            $input_data = $old_input;
        }

        return view('inquiry/index')->with(['input_data' => $input_data]);
    }

    public function post(SendInquiry $request)
    {
        $post_data = $request->all();
        Inquiry::saveInquiry($post_data);
        $message = Message::fetch('inquiry', $post_data);
        Line::notify($message);

        return redirect('/')->with(['message' => '問い合わせを送信しました']);
    }
}
