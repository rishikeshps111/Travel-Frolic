<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PackageImagePostRequest extends FormRequest
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
            'file.required' => 'Please choose at least one image.',
            'file.array' => 'There was an issue with the images input.',
            'file.*.image' => 'Each file must be an image.',
            'file.*.mimes' => 'Only jpeg, png, jpg, and gif images are allowed.',
            'file.*.max' => 'Each image may not be greater than 2MB.',
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'file.*' => 'image|mimes:jpeg,png,jpg|max:2048',
        ];
    }
}
