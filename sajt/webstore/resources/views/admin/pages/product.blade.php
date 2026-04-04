@extends('layouts.admin')

@php
    use App\Models\Product;
    $product = $product ?? new Product();
@endphp

@section('content')
    <div class="min-h-screen flex items-center justify-center bg-gray-100 p-4">
        <div class="w-full max-w-3xl bg-white shadow-lg rounded-2xl p-6">

            <h2 class="text-2xl font-bold mb-6 text-center">
                {{ $isEdit ? 'Edit Product' : 'Add Product' }}
            </h2>

            <input type="hidden" id="csrf_token" value="{{ csrf_token() }}">
            <form id="productForm" class="space-y-4" method="POST" action="{{ $isEdit ? route('admin.edit-product', $product->id) : route('admin.add-product') }}" enctype="multipart/form-data">
                @csrf

                @if($isEdit)
                    @method('PATCH')
                @endif
                <!-- Product Name -->
                <div>
                    <h4 class="text-sm font-semibold text-gray-700 mb-2">Product name</h4>
                    <input type="text" name="product_name" value="{{ old('product_name', $product->name ?? '') }}"
                           class="text-blue-700 font-bold mt-1 w-full border rounded-lg p-2 focus:ring-2 focus:ring-blue-500 outline-none">
                </div>

                <!-- Price + Discount -->
                <div class="flex flex-col md:flex-row gap-4">

                    <div class="flex-1">
                        <h4 class="text-sm font-semibold text-gray-700 mb-2">Price</h4>
                        <input type="number" name="price" step="1" min="1" max="100000" value="{{ old('price', $product->price ?? '') }}"
                               class="text-blue-700 font-bold mt-1 w-full border rounded-lg p-2 focus:ring-2 focus:ring-blue-500 outline-none">
                    </div>

                    <div class="flex items-end gap-2">
                        <input type="checkbox" id="hasDiscount" name="discount_price_checkbox"
                               value="{{ old('discount_price', $product->discount_price ?? '') }}">
                        <label class="text-sm">Discount</label>
                    </div>

                    <div id="discountWrapper" class="flex-1 hidden">
                        <h4 class="text-sm font-semibold text-gray-700 mb-2">Discount price</h4>
                        <input type="number" name="discount_price" step="1" min="1" max="100000" value="{{ $product->discount_price }}"
                               class="text-blue-700 font-bold mt-1 w-full border rounded-lg p-2 focus:ring-2 focus:ring-green-400 outline-none">
                    </div>

                </div>

                <!-- Description -->
                <div>
                    <h4 class="text-sm font-semibold text-gray-700 mb-2">Description</h4>
                    <textarea name="description" rows="4"
                              class="text-blue-700 font-bold mt-1 w-full border rounded-lg p-2 focus:ring-2 focus:ring-blue-500 outline-none">{{ old('description', $product->description ?? '') }}</textarea>
                </div>

                <!-- Quantity -->
                <div>
                    <h4 class="text-sm font-semibold text-gray-700 mb-2">On stock</h4>
                    <input type="number" name="quantity" min="0" value="{{ old('quantity', $product->stock ?? 1) }}"
                           class="text-blue-700 font-bold mt-1 w-full border rounded-lg p-2 focus:ring-2 focus:ring-blue-500 outline-none">
                </div>

                <!-- Category -->
                <div>
                    <h4 class="text-sm font-semibold text-gray-700 mb-2">Category</h4>
                    <select name="category"
                            class="text-blue-700 font-bold mt-1 w-full border rounded-lg p-2 focus:ring-2 focus:ring-blue-500 outline-none">
                        <option value="default">Select category</option>
                        @foreach($categories as $category)
                            @if($category->parent_id!=null)
                                <option value="{{ $category->id }}"
                                    {{ $category->id == ($product->category_id ?? old('category')) ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endif
                        @endforeach
                    </select>
                </div>


                <div class="space-y-3" id="specContainer">
                    <h4 class="text-sm font-semibold text-gray-700 mb-2">Specification</h4>
                    @foreach($specs as $spec)
                        <div class="flex items-center gap-2 bg-gray-50 p-3 rounded-xl shadow-sm">

                            <!-- Spec name (disabled) -->
                            <input type="text"
                                   value="{{ old('spec_name.' . $spec['id'], $spec['name'] ?? '') }}"
                                   disabled
                                   class="w-1/3 bg-gray-200 text-blue-700 font-bold border rounded-lg p-2 cursor-not-allowed">

                            <!-- Spec value -->
                            <input type="text"
                                   name="spec_value[{{ $spec["id"] }}]"
                                   value="{{ $spec['value']??null }}"
                                   data-id="{{ $spec['id'] }}"
                                   class="flex-1 border rounded-lg p-2 text-blue-700 font-bold focus:ring-2 focus:ring-blue-400 outline-none">

                            <!-- Remove value button -->
                            <button type="button"
                                    class="cursor-pointer removeValue text-red-500 hover:text-red-700 text-lg"
                                    title="Clear value">
                                <i class="fa fa-times fa-lg" aria-hidden="true"></i>
                            </button>

                        </div>
                    @endforeach
                </div>


                <!-- Images Preview -->
                @if($isEdit && $product->images->count())
                <div class="mt-6">
                    <h4 class="text-sm font-semibold text-gray-700 mb-3">Product Images</h4>

                    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4">

                        @foreach($product->images as $img)
                            <div class="relative group overflow-hidden rounded-xl shadow-sm">


                                <img src="{{ asset('storage/' . $img->image_path) }}" alt="{{ $img->image_alt }}"
                                     class="w-full h-32 object-cover transition duration-300 group-hover:blur-sm">


                                <div class="absolute inset-0 flex items-center justify-center gap-4
                            bg-black/40 opacity-0 group-hover:opacity-100 transition duration-300">

                                    <button type="button"
                                            title="Set as thumbnail"
                                            data-id="{{ $img->id }}"
                                            class="changeThumbnail text-white text-xl hover:scale-110 transition cursor-pointer {{ $img->is_thumbnail ? 'hidden' : '' }}">
                                        <i class="fa-solid fa-thumbtack fa-xl"></i>
                                    </button>

                                    <button type="button"
                                            title="Delete this image"
                                            data-id="{{ $img->id }}"
                                            class="cursor-pointer deleteImage text-red-400 text-xl hover:text-red-600 hover:scale-110 transition">
                                        <i class="fa fa-trash fa-xl"></i>
                                    </button>

                                </div>

                            </div>
                        @endforeach

                    </div>
                </div>
                @endif

                <!-- Images -->
                <div>
                    <h4 class="text-sm font-semibold text-gray-700 mb-2">Upload image/images</h4>
                    <input type="file" name="images[]" multiple
                           class="cursor-pointer mt-1 w-full border rounded-lg p-2">
                </div>

                <!-- Submit -->
                <div class="text-center">
                    <button type="submit"
                            class="cursor-pointer bg-blue-700 text-white px-6 py-2 rounded-xl hover:bg-blue-600 transition">
                        {{ $isEdit ? 'Update' : 'Create' }}
                    </button>
                </div>

            </form>

            @if($errors->any())
                <div class="my-3 text-center">
                    <ul class="list-unstyled italic text-red-700">
                        @foreach($errors as $e)
                            <li>{{ $e }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    </div>

@endsection
