<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
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
            'email' => [Rule::unique('users')->ignore($this->get('id')), 'required', 'email'], 
            'name' => 'required', 
            'role' => 'required', 
            'avatar-img' => 'image'
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'Không được để trống mục này',
            'email.email' => 'Phải nhập vào email: example@gmail.com',
            'name.required' => 'Không được để trống mục này',
            'role.required' => 'Không tồn tại ID người dùng',
            'email.unique' => 'Email đã được sử dụng', 
            'avatar-img.image' => 'Tệp tải lên phải ở định dạng ảnh: jpeg, png, bmp, gif, hoặc svg'
        ];
    }
}
