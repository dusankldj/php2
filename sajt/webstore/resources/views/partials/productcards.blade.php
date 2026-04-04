<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- PRODUCT CARDS --}}
    @if(!$products->isEmpty())
        @foreach($products as $p)
            <div class="bg-white border rounded-lg shadow-sm hover:shadow-md transition overflow-hidden">

                {{-- IMAGE --}}
                @if($p->thumbnail)
                    <a href="{{ route('product', ['productID'=>$p->id]) }}" class="">
                    <img src="{{ asset('storage/' . $p->thumbnail->image_path) }}"
                         alt="{{ $p->thumbnail->image_alt }}"></a>
                @endif


                {{-- CONTENT --}}
                <div class="p-4 flex flex-col gap-2" data-id="{{ $p->id }}">

                    <a href="{{ route('product', ['productID'=>$p->id]) }}" class="">
                        <h3 class="font-semibold text-lg">{{$p->name}}</h3>
                    </a>

                    <p class="text-sm text-gray-500">
                        @if($p->category->parent)
                            {{ $p->category->parent->name }}
                        @else
                            {{ $p->category->name }}
                        @endif
                    </p>

                    {{-- PRICE --}}
                    <div class="mt-2 flex flex-col gap-3">

                        {{-- PRICE --}}
                        <div class="flex items-center justify-between">
                            @if($p->discount_price!=null)
                                <span class="line-through text-red-700">
                                        {{ $p->price }}&nbsp;$
                                    </span>

                                <span class="text-blue-600 font-bold text-lg">
                                        {{ $p->discount_price }}&nbsp;$
                                    </span>
                            @else
                                <span class="text-blue-700 font-bold text-lg">
                                        {{ $p->price }}&nbsp;$
                                    </span>
                            @endif
                        </div>



                        {{-- BUTTON --}}
                        <div class="flex justify-center product-action" data-id="{{ $p->id }}">

                            @if(auth()->check() && auth()->user()->role->name=='admin')
                                <div class="flex gap-2">
                                    <a href="{{ route('admin.product.edit', $p->id) }}"
                                       class="inline-block bg-green-700 hover:bg-green-800 text-white px-4 py-2 rounded font-semibold transition">
                                        Update&nbsp;&nbsp;<i class="fa-solid fa-pen-to-square"></i>
                                    </a>

                                    <button data-id="{{ $p->id }}" class="buttonDeleteProduct cursor-pointer bg-red-700 hover:bg-red-700 text-white px-4 py-2 rounded font-semibold">
                                        Delete&nbsp;&nbsp;<i class="fa-solid fa-trash-can"></i>
                                    </button>
                                </div>
                            @else
                                @if($p->stock == 0)
                                    <div class="bg-red-700 text-white text-center py-3 px-4 rounded-lg font-semibold">
                                        Out of stock&nbsp;&nbsp;<i class="fa-solid fa-store-slash fa-lg"></i>
                                    </div>
                                @else
                                    <button class="cursor-pointer bg-blue-700 text-white px-4 py-2 rounded font-semibold flex items-center gap-2 addToCart"
                                            data-id="{{ $p->id }}"
                                            data-session="{{ session()->has('username') ? 1 : 0 }}">
                                        Add to cart
                                        <i class="fa-solid fa-cart-shopping fa-lg"></i>
                                    </button>
                                @endif
                            @endif
                        </div>

                    </div>

                </div>
            </div>
        @endforeach
    @else
        <div class="col-span-1 sm:col-span-2 lg:col-span-3 xl:col-span-4 flex justify-center mt-10">
            <h2 class="italic font-extrabold text-center text-lg text-gray-600">
                Currently no products with these filters&nbsp;<i class="fa-solid fa-filter fa-lg"></i>
            </h2>
        </div>
    @endif
</div>
