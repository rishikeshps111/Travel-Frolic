<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TestimonialPostRequest extends FormRequest
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
        $rules = [
            'name' => 'required',
            'message' => 'required',
        ];

        if (!$this->has('id')) { // Assuming you're using Laravel's FormRequest
            $rules['image'] = 'required|image|mimes:jpeg,png,jpg|max:5120';
        } else {
            $rules['image'] = 'nullable|image|mimes:jpeg,png,jpg|max:5120';
        }

        return $rules;
    }
}
