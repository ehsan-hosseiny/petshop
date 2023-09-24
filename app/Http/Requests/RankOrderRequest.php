<?php

namespace App\Http\Requests;


use App\Http\Requests\Rule\UserOrderValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class RankOrderRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        $rule["order_id"] = ["required",new UserOrderValidationRule()];
        $rule["rate"] = ["required","numeric","between:1,5"];
        return $rule;
    }

    public function messages()
    {
        return [
            'rate.required'=>'لطفا امتیاز را وارد نمایید',
            'rate.numeric'=>'امتیاز میبایست عدد باشد',
            'rate.between'=>'امتیاز وارد شده اشتباه است'
        ];

    }
}
