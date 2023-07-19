<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class VideoUpdateRequest extends FormRequest
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
            'title_uz' => ['string', 'max:400'],
            'title_en' => ['string', 'max:400'],
            'title_ru' => ['string', 'max:400'],
            'date_mask' => [''],
            'image_url' => ['string'],
            'video_url' => ['string'],
            'gallery_id' => ['integer', 'exists:galleries,id'],
            'status' => [''],
            'order' => ['integer'],
        ];
    }
}
