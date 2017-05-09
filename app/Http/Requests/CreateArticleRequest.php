<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateArticleRequest extends FormRequest
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
            'title' => 'required|max:100',
            'slug' => 'required|unique:articles',
            'description' => 'required|max:300',
            'content' => 'required',
            'file' => 'image',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Vui lòng thêm tiêu đề!',
            'slug.required' => 'Vui lòng thêm đường dẫn!',
            'description.required' => 'Vui lòng thêm mô tả bài viết!',
            'content.required' => 'Vui lòng thêm nội dung cho bài viết!',
            'title.max' => 'Độ dài tiêu đề không quá 100 ký tự',
            'description.max' => 'Mô tả không được dài quá 300 ký tự',
            'file.image' => 'Tải lên tệp tin ở định dạng ảnh',
            'slug.unique' => 'Đường dẫn tới bài viết đã tồn tại'
        ];
    }
}
