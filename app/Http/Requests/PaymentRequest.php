<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PaymentRequest extends FormRequest
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
            'user_id' => ['required','integer'],
            'amount' => ['nullable'],
            'date' => ['nullable','date'],
            'debit_cost' => ['nullable','boolean'],
            'pay_type'=>['nullable','boolean'],
            'description'=>['nullable','string','max:450']
        ];
    }
}
