<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateArticleRequest extends FormRequest
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
            'slug' => [Rule::unique('articles')->ignore($this->get('id')), 'required'],
            'title' => 'required|max:100',
            'description' => 'required|max:300',
            'content' => 'required',
            'thumbnail' => 'image|max:5000',
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
            'thumbnail.image' => 'Tải lên tệp tin ở định dạng ảnh jpeg, png, bmp, gif, hoặc svg',
            'thumbnail.max' => 'Vui lòng tải lên tệp tin ở dạng ảnh dưới 5MB',
            'slug.unique' => 'Đường dẫn tới bài viết đã tồn tại'
        ];
    }
}
