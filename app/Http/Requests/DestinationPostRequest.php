<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DestinationPostRequest extends FormRequest
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
            'description.max' => 'The :attribute may not be greater than 200 characters.',
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
            'place_name' => 'required',
            'state' => 'required',
            'country' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:5120',
            'description' => 'max:200',
        ];

        if (!$this->has('id')) { // Assuming you're using Laravel's FormRequest
            $rules['image'] = 'required|image|mimes:jpeg,png,jpg|max:5120';
        } else {
            $rules['image'] = 'nullable|image|mimes:jpeg,png,jpg|max:5120';
        }

        return $rules;
    }
}
