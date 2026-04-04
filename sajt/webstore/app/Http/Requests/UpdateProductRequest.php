<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
            'images' => 'nullable|array',
            'images.*' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048'
        ];

    }

    public function messages():array{
        return[
          'name.required' => 'Product name is required.',
          'name.min' => 'Product name must be at least 3 characters.',

          'price.required' => 'Product price is required.',
          'price.min' => 'Product price must be at least 1.',

          'discount_price' => 'Product price is required.',
          'discount_price.lt' => 'Discount price must be lower than price.',

          'dexcription.required' => 'Description is required.',
          'description.min.min' => 'Description must be at least 3 characters.',

          'quantity.required' => 'Quantity is required.',
          'quantity.min' => 'Quantity minimum is 0.',

          'images.*.mimes' => 'Image must be in jpg, jpeg, png or webp format.',
          'images.*.max' => 'Image must be less than 2MB.',
        ];
    }
}
