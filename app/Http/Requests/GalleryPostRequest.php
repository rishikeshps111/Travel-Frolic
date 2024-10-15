<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GalleryPostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }


    public function messages(): array
    {
        return [
            'destination.required' => 'Please select a destination.',
            'images.required' => 'Please choose at least one image.',
            'images.array' => 'There was an issue with the images input.',
            'images.*.image' => 'Each file must be an image.',
            'images.*.mimes' => 'Only jpeg, png, jpg, and gif images are allowed.',
            'images.*.max' => 'Each image may not be greater than 2MB.',
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $rules = [
            'destination' => 'required',
            'images' => 'required|array',
            'images.*' => 'image|mimes:jpeg,png,jpg|max:2048', // Validation for each image
        ];

        return $rules;
    }
}
