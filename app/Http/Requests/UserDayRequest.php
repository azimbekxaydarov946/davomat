<?php

namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserDayRequest extends FormRequest
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
        $id = $this->route('dayUser');
        $user_id = request()->input('user_id');
        $day_id = request()->input('day_id');
        $unique = Rule::unique('user_days')
            ->where(function ($query) use ($user_id, $day_id) {
                return $query->where('user_id', $user_id)
                    ->where('day_id', $day_id);
            });
        if (request()->isMethod('PUT')) {
            $unique = $unique->ignore($id);
        }
        return [
            'user_id' => ['required',$unique],
            'day_id' => ['required',$unique],
            'food_id' => ['nullable'],
            'is_pay' => ['nullable'],
            'yegan_yemagan'=>['nullable']
        ];
    }
}
