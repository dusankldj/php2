@extends('layouts.app')

@section('head')
    <meta name="description" content="Home page">
    <meta name="keywords" content="webstore, home page, store">
@endsection

@section('content')

<div class="max-w-7xl mx-auto px-4 pt-24 pb-16 min-h-screen">

    <!-- Hero Section (zamena za carousel) -->
    <div class="bg-white rounded-2xl shadow-md overflow-hidden">
        <img src="{{ asset('assets/img/1110x350.png') }}"
             class="w-full h-80 object-cover"
             alt="Hero image">

        <div class="p-8 text-center">
            <h2 class="text-3xl font-bold mb-4">Welcome to Our Shop</h2>
            <p class="text-gray-600">Discover our best selling products below.</p>
        </div>
    </div>

    <!-- Best Sellers -->
    <div class="mt-12">
        <h2 class="text-2xl font-bold mb-6">Best Sellers</h2>
        <hr class="mb-8">

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">

            <!-- Product Card -->
            @for ($i = 1; $i <= 6; $i++)
                <div class="bg-white rounded-2xl shadow-md overflow-hidden hover:shadow-xl transition">
                    <img src="{{ asset('assets/img/700x400.png') }}"
                         class="w-full h-48 object-cover"
                         alt="Product">

                    <div class="p-6">
                        <h4 class="text-lg font-semibold mb-2">Item {{ $i }}</h4>
                        <p class="text-blue-600 font-bold mb-2">$24.99</p>
                        <p class="text-gray-600 text-sm">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur.
                        </p>
                    </div>
                </div>
            @endfor

        </div>
    </div>

</div>
@endsection

