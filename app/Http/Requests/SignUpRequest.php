<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SignUpRequest extends FormRequest
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
            'name' => 'required',
            'email' => 'required|unique:users|email', 
            'password' => 'confirmed|required|min:6|regex:/^[a-zA-Z0-9]+$/',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Vui lòng nhập họ tên',
            'email.unique' => 'Email đã có người sử dụng',
            'email.required' => 'Vui lòng nhập email',
            'email.email' => 'Vui lòng nhập email có dạng example@...',
            'password.confirmed' => 'Nhập lại password sai',
            'password.required' => 'Vui lòng nhập password',
            'password.regex' => 'Password không được chứa ký tự đặc biệt',
            'password.min' => 'Password phải từ 6 ký tự trở lên',
        ];
    }
}
