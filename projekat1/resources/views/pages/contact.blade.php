<?php

?>

@extends('layouts.app')

@section('head')
    <meta name="description" content="Contact page of our company">
    <meta name="keywords" content="contact, email, telephone, phone">
@endsection

@section('content')
    <div class="bg-gray-50 min-h-screen">
        <!-- Hero sekcija -->
        <section class="bg-white shadow-md">
            <div class="max-w-7xl mx-auto px-6 py-16 text-center">
                <h1 class="text-4xl font-bold mt-6 text-gray-800">Kontaktirajte nas</h1>
                <p class="mt-4 text-lg text-gray-600">Imate pitanja? Tu smo da pomognemo.</p>
            </div>
        </section>

        <!-- Kontakt informacije -->
        <section class="max-w-7xl mx-auto px-6 py-12">
            <h2 class="text-2xl font-semibold text-gray-800 mb-6">Naši podaci</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bg-white shadow rounded-lg p-6 text-center">
                    <h3 class="font-medium text-gray-700">Adresa</h3>
                    <p class="mt-2 text-gray-600">Ulica 123, Beograd, Srbija</p>
                </div>
                <div class="bg-white shadow rounded-lg p-6 text-center">
                    <h3 class="font-medium text-gray-700">Telefon</h3>
                    <p class="mt-2 text-gray-600">+381 11 123 456</p>
                </div>
                <div class="bg-white shadow rounded-lg p-6 text-center">
                    <h3 class="font-medium text-gray-700">Email</h3>
                    <p class="mt-2 text-gray-600">info@prodavnica.rs</p>
                </div>
            </div>
        </section>

        <!-- Forma za kontakt -->
        <section class="bg-gray-100 py-12">
            <div class="max-w-3xl mx-auto px-6">
                <h2 class="text-2xl font-semibold text-gray-800 mb-6">Pošaljite poruku</h2>
                <form class="bg-white shadow rounded-lg p-6 space-y-4">
                    <div>
                        <label class="block text-gray-700 font-medium">Ime i prezime</label>
                        <input type="text" class="mt-2 w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-indigo-500 focus:outline-none">
                    </div>
                    <div>
                        <label class="block text-gray-700 font-medium">Email</label>
                        <input type="email" class="mt-2 w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-indigo-500 focus:outline-none">
                    </div>
                    <div>
                        <label class="block text-gray-700 font-medium">Poruka</label>
                        <textarea rows="5" class="mt-2 w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-indigo-500 focus:outline-none"></textarea>
                    </div>
                    <button type="submit" class="w-full bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700">
                        Pošalji
                    </button>
                </form>
            </div>
        </section>
    </div>
@endsection
