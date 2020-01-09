<?php

namespace App\Http\Requests;

use App\Models\UserSchedule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserSetting extends FormRequest
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
            'weekday_default_status' => ['required', Rule::in(UserSchedule::getStatusList())],
            'holiday_default_status' => ['required', Rule::in(UserSchedule::getStatusList())],
            'description' => 'max:128',
        ];
    }

    public function messages()
    {
        return [
            'display_name.required' => '表示名は必須です',
            'display_name.max'  => '表示名は16文字までです',
            'weekday_default_status.required' => '平日の予定は必須です',
            'weekday_default_status.in' => '平日の値が不正です',
            'holiday_default_status.required' => '土日祝日の予定は必須です',
            'holiday_default_status.in' => '土日祝日の値が不正です',
            'description.max'  => '説明テキストは128文字までです',
        ];
    }
}
