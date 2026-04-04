@extends('layouts.app')

@section('content')
    <section class="max-w-7xl mx-auto px-4 py-8">

        <!-- GORNJI DEO -->
        <div class="flex flex-col lg:flex-row gap-8">

            <!-- LEVA STRANA (SLIKE) -->
            <div class="lg:w-1/2">

                <!-- Thumbnail -->
                @if($product->thumbnail)
                <div class="w-full h-80 bg-gray-100 flex items-center justify-center rounded-lg overflow-hidden">
                    <img id="mainImage"
                         src="{{ asset('storage/'. $product->thumbnail->image_path) }}"
                         class="h-full object-contain"
                         alt="{{ $product->thumbnail->image_alt }}">
                </div>
                @endif

                <!-- Gallery -->
                <div class="flex gap-3 mt-4 overflow-x-auto">
                    @foreach($product->images as $image)
                        @if($image->is_thumbnail==0)
                            <img src="{{ asset('storage/'. $image->image_path) }}"
                                 alt="{{ $image->image_alt }}"
                                 class="gallery-img w-20 h-20 object-cover rounded cursor-pointer border hover:border-blue-700">
                        @endif
                    @endforeach
                </div>

            </div>

            <!-- DESNA STRANA (INFO) -->
            <div class="lg:w-1/2 flex flex-col gap-4">

                <h1 class="text-2xl font-bold">{{ $product->name }}</h1>

                @if($product->category->parent)
                    <p>
                        {{ $product->category->parent->name }}
                        >
                        {{ $product->category->name }}
                    </p>
                @else
                    <p>{{ $product->category->name }}</p>
                @endif

                @if($product->discount_price)
                    <p class="italic line-through text-red-600 text-bold">{{ $product->price }}&nbsp;$</p>
                    <p class="italic font-bold text-lg">{{ $product->discount_price }}&nbsp;$</p>
                @else
                    <p class="italic font-bold text-lg">{{ $product->price }}&nbsp;$</p>
                @endif

                @if($product->stock==0)
                    <div class="bg-red-600 w-60 text-white text-center py-3 px-4 rounded-lg font-semibold">
                        Out of stock&nbsp;&nbsp;<i class="fa-solid fa-store-slash fa-lg"></i>
                    </div>
                @else
                    <meta name="csrf-token" content="{{ csrf_token() }}">
                    <button class="cursor-pointer bg-blue-700 w-60 text-white py-3 px-6 rounded-lg font-semibold hover:bg-blue-800 transition active:scale-95 addToCart" data-id="{{ $product->id }}" data-session="{{ session()->has('username') ? 1 : 0 }}">
                        Add to cart&nbsp;&nbsp;<i class="fa-solid fa-cart-shopping fa-lg"></i>
                    </button>
                @endif

            </div>

        </div>

        <!-- OPIS -->
        <div class="mt-10">
            <h2 class="text-xl font-semibold mb-2">Description</h2>
            <p class="text-gray-600 leading-relaxed">
                {{ $product->description }}
            </p>
        </div>

        <!-- SPECIFIKACIJE -->
        <div class="mt-10">
            <h2 class="text-xl font-semibold mb-4">Specifications</h2>

            <div class="overflow-x-auto">
                <table class="w-full border border-gray-200 rounded-lg overflow-hidden">
                    <tbody>
                    @foreach($product->specifications as $spec)
                        <tr class="border-b">
                            <td class="p-3 font-medium bg-gray-50 w-1/3">{{ $spec->name }}</td>
                            <td class="p-3">{{ $spec->pivot->value ?? 'N/A' }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </section>
@endsection
