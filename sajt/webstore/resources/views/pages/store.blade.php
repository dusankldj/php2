@extends('layouts.app')

@php
    $current = $products->currentPage();
    $last = $products->lastPage();

    if ($last <= 7) {
        $start = 1;
        $end = $last;
    }else{
        $start = max($current - 3, 1);
        $end = min($current + 3, $last);
    }
@endphp

@section('content')
    <div class="flex flex-col md:flex-row">

        {{-- ASIDE --}}
        <div class="md:w-1/4 lg:w-1/5">
            @include('components.component-aside-menu')
        </div>

        {{-- MAIN CONTENT --}}
        <div class="flex-1 p-6">

            {{-- FILTERI --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-6">

                <select id="stock" class="w-full border border-gray-300 rounded px-3 py-2 focus:ring-2 focus:ring-blue-500">
                    <option selected value="all">All</option>
                    <option value="available">On stock</option>
                </select>

                <select id="discount" class="w-full border border-gray-300 rounded px-3 py-2 focus:ring-2 focus:ring-blue-500">
                    <option selected value="all">All</option>
                    <option value="discount">On discount</option>
                </select>

                <select id="sortByName" class="w-full border border-gray-300 rounded px-3 py-2 focus:ring-2 focus:ring-blue-500">
                    <option value="default" selected>Sort by (Default)</option>
                    <option value="nameASC">Name asc</option>
                    <option value="nameDESC">Name desc</option>
                </select>

                <select id="sortByPrice" class="w-full border border-gray-300 rounded px-3 py-2 focus:ring-2 focus:ring-blue-500">
                    <option value="default" selected>Sort by (Default)</option>
                    <option value="priceASC">Price asc</option>
                    <option value="priceDESC">Price desc</option>
                </select>

                {{-- PRICE FILTERS (2 u redu) --}}
                <div class="col-span-1 sm:col-span-2 lg:col-span-4 grid grid-cols-1 md:grid-cols-2 gap-4">

                    {{-- PRICE FILTER 1 --}}
                    <div class="bg-gray-50 p-4 rounded shadow-sm relative">

                        {{-- INPUT TOP RIGHT --}}
                        <input
                            type="number"
                            id="minInput"
                            min="0"
                            max="100000"
                            class="absolute top-2 right-2 w-24 text-sm border rounded px-2 py-1
                            text-blue-700 font-bold focus:outline-none focus:ring-2 focus:ring-blue-500"
                        />

                        <div class="flex justify-between text-sm text-blue-700 font-bold mb-2">
                            <span>Min Price</span>
                        </div>

                        <input
                            id="minRange"
                            type="range"
                            min="0"
                            max="100000"
                            value="100"
                            class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer"
                        >

                        <div class="flex justify-between text-xs text-blue-700 font-bold mt-1">
                            <span>$0</span>
                            <span>$100 000</span>
                        </div>

                    </div>

                    {{-- PRICE FILTER 2 --}}
                    <div class="bg-gray-50 p-4 rounded shadow-sm relative">

                        {{-- INPUT TOP RIGHT --}}
                        <input
                            type="number"
                            id="maxInput"
                            min="0"
                            max="100000"
                            class="absolute top-2 right-2 w-24 text-sm border rounded px-2 py-1
                            text-blue-700 font-bold focus:outline-none focus:ring-2 focus:ring-blue-500"
                        />

                        <div class="flex justify-between text-sm text-blue-700 font-bold mb-2">
                            <span>Max Price</span>
                        </div>

                        <input
                            id="maxRange"
                            type="range"
                            min="0"
                            max="100000"
                            value="800"
                            class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer"
                        >

                        <div class="flex justify-between text-xs text-blue-700 font-bold mt-1">
                            <span>$0</span>
                            <span>$100 000</span>
                        </div>

                    </div>

                </div>

            </div>

            {{-- PRODUCTS GRID --}}
            <div id="productsContainer">
                @include('partials.productcards')
            </div>

        </div>
    </div>


    <div class="flex justify-center my-6">
        {{ $products->links() }}
    </div>
@endsection
