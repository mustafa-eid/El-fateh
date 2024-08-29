<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WhyUsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'en_title' => 'required|string',
            'ar_title' => 'required|string',
            'en_content' => 'required|string',
            'ar_content' => 'required|string',
            'en_category' => 'nullable|string',
            'ar_category' => 'nullable|string',

        ];
    }
}
