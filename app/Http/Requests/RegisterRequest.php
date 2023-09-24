<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
        return [
            'name'=>'required',
            'email'=>'required|email|unique:users,email',
            'password'=>'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'لطفا نام را وارد نمایید',
            'email.required' => 'لطفا ایمیل را وارد نمایید',
            'email.email' => 'فرمت ایمیل اشتباه است',
            'email.unique' => 'آدرس ایمیل تکراری است',
            'password.required' => 'لطفا رمز عبور را وارد نمایید',
        ];

    }
}
