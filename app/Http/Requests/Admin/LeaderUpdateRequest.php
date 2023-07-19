<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class LeaderUpdateRequest extends FormRequest
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
            'name_uz' => ['required', 'string', 'max:400'],
            'name_en' => ['required', 'string', 'max:400'],
            'name_ru' => ['required', 'string', 'max:400'],
            'position_uz' => ['required', 'string', 'max:255'],
            'position_en' => ['required', 'string', 'max:255'],
            'position_ru' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:255'],
            'reception_days_uz' => ['required', 'string', 'max:255'],
            'reception_days_en' => ['required', 'string', 'max:255'],
            'reception_days_ru' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'content_uz' => ['required', 'string'],
            'content_en' => ['required', 'string'],
            'content_ru' => ['required', 'string'],
            'order' => ['required', 'integer'],
            'status' => ['required'],
        ];
    }
}
