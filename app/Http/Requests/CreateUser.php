<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateUser extends FormRequest
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
            'display_name' => 'required|max:16',
            'weekday_default_status' => ['required', Rule::in([1, 2, 3])],
            'holiday_default_status' => ['required', Rule::in([1, 2, 3])],
            'description' => 'max:200',
        ];
    }

    public function messages()
    {
        return [
            'display_name.required' => '表示名は必須です',
            'display_name.max'  => '表示名は16文字までです',
            'description.max'  => '説明テキストは200文字までです',
        ];
    }
}
