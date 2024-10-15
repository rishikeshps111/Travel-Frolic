<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EnquiryPostRequest extends FormRequest
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
            'name.required' => 'Please enter your name.',
            'phone.required' => 'Please enter your phone number.',
            'email_id.required' => 'Please enter your email address.',
            'email_id.email' => 'Please enter a valid email address.',
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
            'name' => ['required'], // Name is required, must be a string, and no more than 255 characters
            'phone' => ['required'], // Phone is required, must be a string, and should match a 10-digit number pattern
            'email_id' => ['required', 'email',], // Email is required, must be a string, a valid email, and no more than 255 characters
        ];
    }
}
