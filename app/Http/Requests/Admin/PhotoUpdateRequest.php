<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class PhotoUpdateRequest extends FormRequest
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
            'image_url' => ['string'],
            'title_uz' => ['required', 'string', 'max:400'],
            'title_en' => ['required', 'string', 'max:400'],
            'title_ru' => ['required', 'string', 'max:400'],
            'gallery_id' => ['integer', 'exists:galleries,id'],
            'status' => [''],
            'order' => ['integer'],
        ];
    }
}
