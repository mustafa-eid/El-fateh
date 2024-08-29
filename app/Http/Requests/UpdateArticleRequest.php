<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateArticleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // Update authorization logic based on your application's requirements
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
            'en_title' => 'required|string|max:255',
            'ar_title' => 'required|string|max:255',
            'en_content' => 'required|string',
            'ar_content' => 'required|string',
            'image' => 'image|mimes:jpeg,png,jpg,gif', 
            'pdf' => 'nullable|mimes:pdf',
            'article_category_id' => 'required|exists:article_categories,id',
            'link' => 'nullable|string',


        ];
    }

}