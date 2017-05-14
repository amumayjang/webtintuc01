<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateCategoryRequest extends FormRequest
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
            'cate_name' => 'required|unique:categories,cate_name',
            'slug' => 'required|unique:categories,slug_cate',
        ];
    }

    public function messages()
    {
        return [
            'cate_name.required' => 'Không được để trống trường này!', 
            'slug.required' => 'Không được để trống trường này!', 
            'slug.required' => 'Không được để trống trường này!',
            'cate_name.unique' => 'Tên danh mục đã tồn tại',
            'slug.unique' => 'Đường dẫn tĩnh đã tồn tại',
        ];
    }
}
