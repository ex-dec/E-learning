<?php

namespace App\Http\Requests\Teacher;

use Illuminate\Foundation\Http\FormRequest;

class MaterialRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => ['required', 'min:5', 'max:255'],
            'content' => ['required', 'min:10'],
            'grade_id' => ['required'],
            'video_url' => ['nullable', 'url'],
            'file_url' => ['nullable'],
        ];
    }
}
