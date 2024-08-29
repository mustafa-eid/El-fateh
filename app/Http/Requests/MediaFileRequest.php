<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MediaFileRequest extends FormRequest
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
            'home_video' => 'required|file|mimes:mp4,mov,avi', 
            'about_video' => 'required|file|mimes:mp4,mov,avi', 
            'article_sliders.*' => 'required|image|mimes:jpeg,png,jpg,gif' 

        ];
    }
}
