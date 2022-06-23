<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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

        $id = $this->route('id');
        $phone = 'nullable';
        if (request()->isMethod('POST')) {
            $phone = ['nullable', 'unique:users,phone'];
        } elseif (request()->isMethod('PUT')) {
            $phone = ['nullable', 'unique:users,phone,'. $id];
        }
        return [
            'firstname'=>['nullable'],
            'lastname'=>['nullable'],
            'department_id'=>['nullable'],
            'phone'=>[$phone, 'string', 'min:13','max:13'],
            'email'=>['nullable'],
            'email_verified_at'=>['nullable'],
            'password'=>['nullable'],
            'is_admin'=>['nullable','boolean']
        ];
    }
}
