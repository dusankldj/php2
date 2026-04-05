<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
    public function rules():array
    {
        return [
            'first_name' => 'required|min:3',
            'last_name'  => 'required|min:3',
            'email'      => 'required|email',
            'message'    => 'required|min:8',
        ];
    }

    public function messages():array
    {
        return [
            'first_name.required' => 'First name is required',
            'first_name.min' => 'First name must have at least 3 characters',

            'last_name.required' => 'Last name is required',
            'last_name.min' => 'Last name must have at least 3 characters',

            'email.required' => 'Email is required',
            'email.email' => 'Email must be valid',

            'message.required' => 'Message is required',
            'message.min' => 'Message must have at least 8 characters',
        ];
    }
}
