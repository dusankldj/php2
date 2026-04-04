<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'name' => [
                'bail',
                'required',
                'string',
                'max:30',
                'regex:/^[A-ZŠĐČĆŽ][a-zšđčćž]+(?:[\s-][A-ZŠĐČĆŽ][a-zšđčćž]+)*$/u'
            ],
            'surname' => [
                'bail',
                'required',
                'string',
                'max:30',
                'regex:/^[A-ZŠĐČĆŽ][a-zšđčćž]+(?:[\s-][A-ZŠĐČĆŽ][a-zšđčćž]+)*$/u'
            ],
            'username' => 'bail|required|string|max:50|unique:users,username',
            'email' => 'bail|required|email|unique:users,email',
            'password' => 'bail|required|min:6',
        ];
    }
}
