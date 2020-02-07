<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SendInquiry extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|max:64',
            'mail' => 'required|email|max:64',
            'text' => 'required|max:400',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => '名前は必須です',
            'name.max'  => '名前は64文字までです',
            'mail.required' => 'メールアドレスは必須です',
            'mail.email' => 'メールアドレスの形式が正しくありません',
            'mail.max' => 'メールアドレスは64文字までです',
            'text.required' => '本文は必須です',
            'text.max'  => '本文は400文字までです',
        ];
    }
}
