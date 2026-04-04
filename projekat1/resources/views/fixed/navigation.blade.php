<?php

?>

<nav class="bg-gray-900 text-white fixed w-full z-50 shadow-md">
    <div class="max-w-7xl mx-auto px-4">
        <div class="flex justify-between items-center h-16">
            <h1 class="text-xl font-semibold">Shop</h1>

            <div class="space-x-6">
                <a href="{{ url('/home') }}" class="hover:text-gray-300">Home</a>
                <a href="{{ url('/products') }}" class="hover:text-gray-300">Products</a>
                <a href="{{ url('/contact') }}" class="hover:text-gray-300">Contact</a>
            </div>
        </div>
    </div>
</nav>

