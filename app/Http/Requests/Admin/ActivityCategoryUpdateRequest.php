<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ActivityCategoryUpdateRequest extends FormRequest
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
            'status' => ['nullable'],
            'order' => ['nullable', 'integer'],
        ];
    }
}
