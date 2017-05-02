<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateCategoryRequest extends FormRequest
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
            'cate_name' => [Rule::unique('categories')->ignore($this->get('id')), 'required'], 
            'slug' => [Rule::unique('categories')->ignore($this->get('id')), 'required']
        ];
    }

    public function messages()
    {
        return [
            'cate_name.required' => 'Không được để trống trường này!', 
            'slug.required' => 'Không được để trống trường này!', 
            'cate_name.unique' => 'Tên danh mục này đã tồn tại',
            'slug.unique' => 'Đường dẫn vừa nhập đã tồn tại',
        ];
    }
}
