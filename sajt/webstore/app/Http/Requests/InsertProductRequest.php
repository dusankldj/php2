<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InsertProductRequest extends FormRequest
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
            'name' => 'required|string|min:3',
            'price' => 'required|numeric|min:0.01',
            'discount_price' => 'nullable|numeric|min:0.01|lt:price',
            'description' => 'required|string|min:3',
            'quantity' => 'required|integer|min:0',
            'category' => 'required|integer',
            'spec_value' => 'required|array',
            'spec_value.*' => 'required|string|min:1',
            'images' => 'array',
            'images.*' => 'image|mimes:jpg,jpeg,png,webp|max:2048'
        ];

    }

    public function messages():array{
        return[
            'name.required' => 'Product name is required.',
            'name.min' => 'Product name must be at least 3 characters.',

            'price.required' => 'Product price is required.',
            'price.min' => 'Product price must be at least 1.',

            'discount_price.required' => 'Product price is required.',
            'discount_price.lt' => 'Discount price must be lower than regular price.',

            'description.required' => 'Description is required.',
            'description.min' => 'Description must be at least 3 characters.',

            'category.required' => 'Select category.',
            'category.integer' => 'You must select one category.',

            'quantity.required' => 'Quantity is required.',
            'quantity.min' => 'Quantity minimum is 0.',

            'spec_value.*.required' => 'Specification value is required.',
            'spec_value.*.min' => 'Specification cannot be empty.',

            'images.*.mimes' => 'Image must be in jpg, jpeg, png or webp format.',
            'images.*.max' => 'Image must be less than 2MB.',
        ];
    }
}
