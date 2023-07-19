<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class NewsUpdateRequest extends FormRequest
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
            'title_uz' => ['required', 'string', 'max:400'],
            'title_en' => ['required', 'string', 'max:400'],
            'title_ru' => ['required', 'string', 'max:400'],
            'sub_content_uz' => ['required', 'string'],
            'sub_content_en' => ['required', 'string'],
            'sub_content_ru' => ['required', 'string'],
            'content_uz' => ['required', 'string'],
            'content_en' => ['required', 'string'],
            'content_ru' => ['required', 'string'],
            'date_mask' => ['required'],
            // 'image_url' => ['required', 'string'],
            'status' => ['required'],
            'order' => ['required', 'integer'],
        ];
    }
}
