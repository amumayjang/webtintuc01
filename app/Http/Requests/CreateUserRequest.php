<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
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
            'email' => 'email|required|unique:users', 
            'name' => 'required', 
            'password' => 'confirmed|required|min:6|regex:/^[a-zA-Z0-9]+$/',
            'role' => 'required', 
            'avatar-img' => 'image'
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'Không được để trống mục này',
            'email.email' => 'Phải nhập vào email',
            'password.required' => 'Không được để trống mục này',
            'name.required' => 'Không được để trống mục này',
            'role.required' => 'Không tồn tại ID người dùng',
            'email.unique' => 'Email đã được sử dụng', 
            'password.min' => 'Password có độ dài tối thiểu 6 ký tự', 
            'password.regex' => 'Password không được chứa ký tự đặc biệt', 
            'password.confirmed' => 'Nhập lại Password không đúng', 
            'avatar-img.image' => 'Tệp tải lên phải ở định dạng ảnh: jpeg, png, bmp, gif, hoặc svg'
        ];
    }
}
