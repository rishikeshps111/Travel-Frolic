<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;
use Illuminate\Foundation\Http\FormRequest;


class UserPostRequest extends FormRequest
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
            'phone.unique' => 'The phone has already been taken.',
            'password.uncompromised' => 'Your password is too weak.',
            'confirm_password.same'  => 'Passwords do not match Please re-enter to confirm.',
            'email.email' => 'The email field must be a valid email address.',
            'email.required' => 'The email field is required.'
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $user_id = User::find($this->id);

        $rules = [
            'name' => 'required',
            'email' => [
                'required',
                'email',
                Rule::unique('users')->ignore($user_id)->whereNull('deleted_at')
            ],
            'phone' => [
                'required',
                Rule::unique('users', 'phone')->ignore($user_id)->whereNull('deleted_at')
            ],
        ];

        if ($this->has('password') && $this->get('password') !== null) {
            $rules['password'] = ['required', Password::min(8)->mixedCase()->numbers()->symbols()->uncompromised()];
            $rules['confirm_password'] = 'required|same:password';
        }
        return $rules;
    }
}
