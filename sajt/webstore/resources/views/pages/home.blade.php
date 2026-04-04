@extends('layouts.app')

@section('content')
    <div class="flex flex-col md:flex-row">

        @component('components.component-aside-menu', ['categories' => $categories])
        @endcomponent

        <!-- Glavni sadržaj -->
        <section class="flex-1 p-6">
            <h1 class="text-2xl font-bold mb-4">Welcome to <span class="text-blue-700">Webstore</span></h1>
            <p class="mb-4">
                Ovde ide glavni sadržaj stranice. Sidebar ostaje uz levu ivicu, a sadržaj se prikazuje u ostatku prostora.
            </p>
            <p>
                Na mobilnim uređajima sidebar se pretvara u dropdown.
            </p>
        </section>

    </div>


    <section class="relative w-full overflow-hidden py-6">
        <div class="my-4">
            <h2 class="font-bold italic text-center text-3xl">Discount&nbsp;&nbsp;<i class="fa-solid fa-percent"></i></h2>
        </div>

        <div id="productCarousel" class="overflow-hidden">
            <div id="productTrack" class="flex">

                <!-- CARD -->
                <div class="product-slide">
                    <div class="bg-white rounded-lg shadow p-4 flex flex-col">
                        <div class="h-40 bg-gray-200 flex items-center justify-center overflow-hidden rounded">
                            <img src="https://picsum.photos/300/300?1"
                                 class="max-h-full object-contain">
                        </div>
                        <h3 class="mt-3 font-semibold">Product 1</h3>
                        <p class="text-sm text-gray-500">$99</p>
                    </div>
                </div>

                <div class="product-slide">
                    <div class="bg-white rounded-lg shadow p-4 flex flex-col">
                        <div class="h-40 bg-gray-200 flex items-center justify-center overflow-hidden rounded">
                            <img src="https://picsum.photos/300/300?2"
                                 class="max-h-full object-contain">
                        </div>
                        <h3 class="mt-3 font-semibold">Product 2</h3>
                        <p class="text-sm text-gray-500">$137</p>
                    </div>
                </div>

                <div class="product-slide">
                    <div class="bg-white rounded-lg shadow p-4 flex flex-col">
                        <div class="h-40 bg-gray-200 flex items-center justify-center overflow-hidden rounded">
                            <img src="https://picsum.photos/300/300?3"
                                 class="max-h-full object-contain">
                        </div>
                        <h3 class="mt-3 font-semibold">Product 3</h3>
                        <p class="text-sm text-gray-500">$269</p>
                    </div>
                </div>

                <div class="product-slide">
                    <div class="bg-white rounded-lg shadow p-4 flex flex-col">
                        <div class="h-40 bg-gray-200 flex items-center justify-center overflow-hidden rounded">
                            <img src="https://picsum.photos/300/300?4"
                                 class="max-h-full object-contain">
                        </div>
                        <h3 class="mt-3 font-semibold">Product 4</h3>
                        <p class="text-sm text-gray-500">$50</p>
                    </div>
                </div>

                <div class="product-slide">
                    <div class="bg-white rounded-lg shadow p-4 flex flex-col">
                        <div class="h-40 bg-gray-200 flex items-center justify-center overflow-hidden rounded">
                            <img src="https://picsum.photos/300/300?5"
                                 class="max-h-full object-contain">
                        </div>
                        <h3 class="mt-3 font-semibold">Product 5</h3>
                        <p class="text-sm text-gray-500">$200</p>
                    </div>
                </div>

                <div class="product-slide">
                    <div class="bg-white rounded-lg shadow p-4 flex flex-col">
                        <div class="h-40 bg-gray-200 flex items-center justify-center overflow-hidden rounded">
                            <img src="https://picsum.photos/300/300?6"
                                 class="max-h-full object-contain">
                        </div>
                        <h3 class="mt-3 font-semibold">Product 1</h3>
                        <p class="text-sm text-gray-500">$99</p>
                    </div>
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
@endsection
