<?php

?>

@extends('layouts.app')

@section('head')
    <meta name="description" content="Products page">
    <meta name="keywords" content="products, item, price, quantity">
@endsection

@section('content')
    <div class="bg-gray-50 min-h-screen">
        <!-- Hero sekcija -->
        <section class="bg-white shadow-md">
            <div class="max-w-7xl mx-auto px-6 py-16 text-center">
                <h1 class="text-4xl font-bold mt-6 text-gray-800">Dobrodošli u našu prodavnicu</h1>
                <p class="mt-4 text-lg text-gray-600">Pronađite najbolje proizvode po sjajnim cenama</p>
                <button class="mt-6 px-6 py-3 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700">
                    Pogledaj ponudu
                </button>
            </div>
        </section>

        <!-- Kategorije -->
        <section class="max-w-7xl mx-auto px-6 py-12">
            <h2 class="text-2xl font-semibold text-gray-800 mb-6">Kategorije</h2>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                <div class="bg-white shadow rounded-lg p-6 text-center hover:shadow-lg">
                    <p class="font-medium text-gray-700">Elektronika</p>
                </div>
                <div class="bg-white shadow rounded-lg p-6 text-center hover:shadow-lg">
                    <p class="font-medium text-gray-700">Odeća</p>
                </div>
                <div class="bg-white shadow rounded-lg p-6 text-center hover:shadow-lg">
                    <p class="font-medium text-gray-700">Kućni aparati</p>
                </div>
                <div class="bg-white shadow rounded-lg p-6 text-center hover:shadow-lg">
                    <p class="font-medium text-gray-700">Sport</p>
                </div>
            </div>
        </section>

        <!-- Istaknuti proizvodi -->
        <section class="bg-gray-100 py-12">
            <div class="max-w-7xl mx-auto px-6">
                <h2 class="text-2xl font-semibold text-gray-800 mb-6">Istaknuti proizvodi</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                    <!-- Kartica proizvoda -->
                    <div class="bg-white shadow rounded-lg overflow-hidden hover:shadow-lg">
                        <img src="https://via.placeholder.com/300x200" alt="Proizvod" class="w-full h-48 object-cover">
                        <div class="p-4">
                            <h3 class="text-lg font-medium text-gray-800">Naziv proizvoda</h3>
                            <p class="text-gray-600 mt-2">Kratak opis proizvoda</p>
                            <p class="text-indigo-600 font-semibold mt-2">3.999 RSD</p>
                            <button class="mt-4 w-full px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700">
                                Dodaj u korpu
                            </button>
                        </div>
                    </div>
                    <!-- Kopiraj ovu karticu za više proizvoda -->
                </div>
            </div>
        </section>

        <!-- Promo sekcija -->
        <section class="max-w-7xl mx-auto px-6 py-16 text-center">
            <h2 class="text-3xl font-bold text-gray-800">Specijalna ponuda</h2>
            <p class="mt-4 text-lg text-gray-600">Iskoristite popust od 20% na sve artikle do kraja meseca!</p>
            <button class="mt-6 px-6 py-3 bg-red-600 text-white rounded-lg hover:bg-red-700">
                Kupi sada
            </button>
        </section>
    </div>
@endsection
