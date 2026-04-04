@extends('layouts.app')

@section('content')

    <input type="hidden" id="csrf-token" value="{{ csrf_token() }}">

    <section class="max-w-7xl mx-auto px-4 py-8">

        <!--  EMPTY STATE -->
        <div id="emptyCart"
             class="flex flex-col items-center justify-center text-center py-16 px-4 {{ $products->isEmpty() ? '' : 'hidden' }}">

            <h2 class="text-2xl md:text-3xl font-bold text-gray-700 mb-4">
                No items in your cart yet.
            </h2>

            <a href="{{ url('store') }}"
               class="bg-blue-700 text-white px-6 mt-3 py-3 rounded-lg font-semibold hover:bg-blue-800 transition active:scale-95">
                Go to store
            </a>
        </div>

        <!-- CART CONTENT -->
        <div id="cartContent"
             class="flex flex-col lg:flex-row gap-8 {{ $products->isEmpty() ? 'hidden' : '' }}">

            <!-- LEVA STRANA -->
            <div class="flex-1 flex flex-col gap-4">

                @foreach($products as $p)
                    <div class="cart-item flex items-center justify-between bg-white p-4 rounded-lg shadow" data-price="{{ $p->product->discount_price ?? $p->product->price }}">

                        <!-- LEVI DEO -->
                        <div class="flex items-center gap-4">

                            <!-- Thumbnail -->
                            @if($p->product->thumbnail)
                                <img src="{{ asset('storage/' . $p->product->thumbnail->image_path) }}"
                                     alt="{{ $p->product->thumbnail->image_alt }}"
                                     class="w-20 h-20 object-cover rounded">
                            @endif

                            <!-- Info -->
                            <div class="flex flex-col">
                                <h3 class="font-semibold">{{ $p->product->name }}</h3>

                                @if($p->product->discount_price!=null)
                                    <span class="text-sm text-red-500 line-through">
                                    {{ $p->product->price }}$
                                </span>
                                    <span class="text-blue-600 font-bold">
                                    {{ $p->product->discount_price }}$
                                </span>
                                @else
                                    <span class="text-blue-600 font-bold">
                                    {{ $p->product->price }}$
                                </span>
                                @endif
                            </div>

                        </div>

                        <!-- DESNI DEO -->
                        <div class="flex items-center gap-4">

                            <!-- Quantity -->
                            <input
                                data-id="{{ $p->product->id }}"
                                type="number"
                                min="1"
                                max="{{ $p->product->stock + $p->quantity }}"
                                value="{{ $p->quantity }}"
                                class="w-16 cartProductQuantity text-center border rounded py-1 focus:outline-none focus:ring-2 focus:ring-blue-500"
                            >

                            <!-- Remove -->
                            <i class="removeFromCart fa-xl fa-solid fa-xmark cursor-pointer text-gray-500 hover:text-red-700"
                               data-id="{{ $p->product->id }}"></i>

                        </div>

                    </div>
                @endforeach

            </div>


            <!-- DESNA STRANA -->
            <div class="lg:w-1/4 flex flex-col gap-4">

                <div class="bg-white p-4 rounded-lg shadow text-center">
                    <h3 class="text-lg font-semibold text-gray-700">Total</h3>
                    <p id="cartTotal" class="text-2xl font-bold text-blue-700 mt-2">  $ </p>
                </div>

                <button id="clearCart"
                        class="bg-red-700 py-3 rounded font-semibold hover:bg-red-800 transition text-white">
                    Clear cart
                </button>

                <button id="checkout"
                        class="bg-blue-700 text-white py-3 rounded font-semibold hover:bg-blue-800 transition active:scale-95">
                    Buy items
                </button>

            </div>

        </div>

    </section>

@endsection
