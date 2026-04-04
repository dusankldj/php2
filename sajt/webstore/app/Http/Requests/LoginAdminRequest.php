<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginAdminRequest extends FormRequest
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
            'username' => [
                'required',
                'min:3',
                'regex:/^[A-Za-zčćžšđČĆŽŠĐ0-9_]+$/u'
            ],
            'password' => [
                'required',
                'min:6',
                'regex:/^[A-Za-zčćžšđČĆŽŠĐ0-9_]+$/u'
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'username.required' => 'Username is required.',
            'username.min' => 'Username must contains minimum 3 characters.',

            'password.required' => 'Password is required.',
            'password.min' => 'Password must contains minimum 6 characters.'
        ];
    }
}
