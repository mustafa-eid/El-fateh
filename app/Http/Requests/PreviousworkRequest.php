<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PreviousWorkRequest extends FormRequest
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
            'image' => 'image|mimes:jpeg,png,jpg,gif',
            'en_engineer_name' => 'required|string|max:255',
            'en_title' => 'required|string|max:255',
            'ar_engineer_name' => 'required|string|max:255',
            'ar_title' => 'required|string|max:255',
            'started_at' => 'required|date',
            'ended_at' => 'required|date|after_or_equal:started_at',
            'en_description' => 'required|string',
            'ar_description' => 'required|string',
            'en_location' => 'required|string|max:255',
            'ar_location' => 'required|string|max:255',
            'en_client' => 'nullable|string|max:255',
            'ar_client' => 'nullable|string|max:255',
            'total_area' => 'nullable|string|max:255',
            'total_units' => 'nullable|string|max:255',
            'total_concrete' => 'nullable|string|max:255',
            'category_id' => 'required|exists:categories,id',
        ];
    }
}
