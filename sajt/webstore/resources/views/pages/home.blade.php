@extends('layouts.app')

@section('content')
    <div class="flex flex-col md:flex-row">

        @component('components.component-aside-menu', ['categories' => $categories])
        @endcomponent

        <!-- Glavni sadržaj -->
            <section class="flex-1 p-6">
                <h1 class="text-2xl font-bold mb-4">Welcome to <span class="italic font-extrabold text-blue-700">Webstore</span></h1>
                <p class="mb-4">
                    Welcome to <span class="italic font-bold text-blue-700">Webstore</span>, the place where you can discover a wide variety of products designed to meet your everyday needs. From household essentials to unique items that spark creativity, our store is built to provide convenience and inspiration.
                </p>
                <p class="mb-4">
                    Whether you are shopping for yourself, your family, or looking for the perfect gift, Webstore offers a carefully curated selection to make your experience enjoyable and efficient.
                </p>
                <p>
                    On mobile devices, the sidebar transforms into a dropdown menu, making navigation simple and user-friendly. Explore, enjoy, and let Webstore be your trusted destination for all the things you need and love.
                </p>
            </section>


    </div>


    <section class="relative w-full overflow-hidden py-6">
        <div class="my-4">
            <h2 class="font-bold italic text-center text-3xl">Some of our products</h2>
        </div>

        <div id="productCarousel" class="overflow-hidden">
            <div id="productTrack" class="flex">

                @foreach($products as $product)
                    <div class="product-slide">
                        <div class="bg-white rounded-lg shadow p-4 flex flex-col">

                            <!-- Slika -->
                            <div class="h-40 bg-gray-200 flex items-center justify-center overflow-hidden rounded">
                                <img src="{{ asset('storage/' . $product->thumbnail->image_path) }}"
                                     alt="{{ $product->thumbnail->image_alt }}">
                            </div>

                            <!-- Naziv -->
                            <h3 class="mt-3 font-semibold">
                                {{ $product->name }}
                            </h3>

                            <div class="mt-2">

                                @if($product->discount_price)
                                    <div class="flex justify-between items-center">

                                        <!-- stara cena -->
                                        <span class="line-through text-red-500 text-sm">
                                            {{ $product->price }} $
                                        </span>

                                        <!-- nova cena -->
                                            <span class="text-blue-600 font-bold text-lg">
                                                {{ $product->discount_price }} $
                                            </span>

                                    </div>
                                @else
                                    <div class="text-right">
                                        <span class="text-blue-700 font-bold text-lg">
                                            {{ $product->price }} $
                                        </span>
                                    </div>
                                @endif

                            </div>

                        </div>
                    </div>
                @endforeach

            </div>

                <!-- Kopiraj još 4-8 proizvoda -->
                <!-- ... -->

            </div>
        </div>

        <!-- Strelice -->
        <button id="prevProduct"
                class="absolute left-2 top-1/2 -translate-y-1/2 bg-black/40 text-white p-2 rounded-full hover:bg-black/70 z-10">
            ❮
        </button>

        <button id="nextProduct"
                class="absolute right-2 top-1/2 -translate-y-1/2 bg-black/40 text-white p-2 rounded-full hover:bg-black/70 z-10">
            ❯
        </button>

    </section>

    <section class="bg-gray-50 py-16">
        <div class="max-w-5xl mx-auto px-6 text-center">

            <!-- Naslov -->
            <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">
                Get in Touch
            </h2>

            <!-- Opis -->
            <p class="text-gray-600 mb-8 max-w-2xl mx-auto">
                Have questions or need assistance? Our team is here to help you.
                Reach out to us and we’ll get back to you as soon as possible.
            </p>

            <!-- Kontakt info -->
            <div class="flex flex-col md:flex-row justify-center items-center gap-6 mb-10">

                <div class="flex items-center gap-2 text-gray-700">
                    <i class="fa-solid fa-envelope"></i>
                    <span>info@webstore.com</span>
                </div>

                <div class="flex items-center gap-2 text-gray-700">
                    <i class="fa-solid fa-phone"></i>
                    <span>+381 11 123 456</span>
                </div>

                <div class="flex items-center gap-2 text-gray-700">
                    <i class="fa-solid fa-location-dot"></i>
                    <span>Belgrade, Serbia</span>
                </div>

            </div>

            <!-- CTA dugme -->
            <a href="{{ route('contact') }}"
               class="inline-block bg-blue-700 text-white px-6 py-3 rounded-lg hover:bg-blue-800 transition duration-300">
                Contact Us
            </a>

        </div>
    </section>
@endsection
