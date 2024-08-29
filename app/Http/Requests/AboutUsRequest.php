<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AboutUsRequest extends FormRequest
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
            'en_company_name' => 'nullable|string|max:255',
            'ar_company_name' => 'nullable|string|max:255',
            'en_about_text' => 'nullable|string',
            'ar_about_text' => 'nullable|string',
            'founded_date' => 'nullable|date',
            'website' => 'nullable|string|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',

       ];
    }
}
