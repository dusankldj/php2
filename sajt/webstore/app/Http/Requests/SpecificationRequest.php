<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Category;

class SpecificationRequest extends FormRequest
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
                'required',
                'string',
                'min:3',
                function ($attribute, $value, $fail) {
                    $exists=Category::find($this->category_id)
                        ?->specifications()
                        ->where('name', $value)
                        ->exists();

                    if ($exists)
                        $fail('This specification already exists.');
                }
            ],
        ];
    }

    public function messages(): array{
        return [
            'name.required' => 'Specification name is required.',
            'name.min' => 'Specification name must be at least 3 characters.',

        ];
    }
}
