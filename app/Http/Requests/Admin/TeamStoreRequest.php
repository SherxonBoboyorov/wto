<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class TeamStoreRequest extends FormRequest
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
            'title_uz' => ['nullable', 'string', 'max:400'],
            'title_en' => ['nullable', 'string', 'max:400'],
            'title_ru' => ['nullable', 'string', 'max:400'],
            'content_uz' => ['nullable', 'string'],
            'content_en' => ['nullable', 'string'],
            'content_ru' => ['nullable', 'string'],
            'biography_uz' => ['nullable', 'string'],
            'biography_en' => ['nullable', 'string'],
            'biography_ru' => ['nullable', 'string'],
            'publication_uz' => ['nullable', 'string'],
            'publication_en' => ['nullable', 'string'],
            'publication_ru' => ['nullable', 'string'],
            'date_mask' => ['nullable'],
            'image_url' => ['nullable', 'string'],
            'status' => ['nullable'],
            'order' => ['nullable', 'integer'],
        ];
    }
}
