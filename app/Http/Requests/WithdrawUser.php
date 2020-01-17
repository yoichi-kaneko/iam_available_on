<?php

namespace App\Http\Requests;

use App\Models\UserSchedule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class WithdrawUser extends FormRequest
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
            'agree_withdraw' => 'present',
        ];
    }

    public function messages()
    {
        return [
            'agree_withdraw.present' => '同意にチェックを入れてください',
        ];
    }
}
