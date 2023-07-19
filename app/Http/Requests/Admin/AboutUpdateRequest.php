<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class AboutUpdateRequest extends FormRequest
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
            'title_uz' => ['required','string', 'max:400'],
            'title_en' => ['string', 'max:400'],
            'title_ru' => ['string', 'max:400'],
            'sub_content_uz' => ['string'],
            'sub_content_en' => ['string'],
            'sub_content_ru' => ['string'],
            'content_uz' => ['string'],
            'content_en' => ['string'],
            'content_ru' => ['string'],
            'image_url' => ['string'],
            'video_url' => ['string'],
            'status' => [],
        ];
    }
}
