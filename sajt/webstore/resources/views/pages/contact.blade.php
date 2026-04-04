@extends('layouts.app')

@section('content')
    <div class="max-w-3xl w-full bg-white p-8 rounded-lg shadow-lg">
        <h1 class="text-3xl font-bold text-center mb-6 text-gray-800">Kontaktirajte nas</h1>
        <p class="text-center mb-8 text-gray-600">Ako imate bilo kakvih pitanja ili želite da nas kontaktirate, molimo vas ispunite obrazac ispod ili koristite kontakt informacije.</p>
        <div class="flex flex-col md:flex-row gap-8">
            <!-- Obrazac -->
            <form class="flex-1 space-y-4">
                <div>
                    <label class="block mb-1 font-medium text-gray-700" for="ime">Ime</label>
                    <input class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" type="text" id="ime" placeholder="Vaše ime" />
                </div>
                <div>
                    <label class="block mb-1 font-medium text-gray-700" for="email">Email</label>
                    <input class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" type="email" id="email" placeholder="Vaš email" />
                </div>
                <div>
                    <label class="block mb-1 font-medium text-gray-700" for="poruka">Poruka</label>
                    <textarea class="w-full border border-gray-300 rounded px-3 py-2 h-32 focus:outline-none focus:ring-2 focus:ring-blue-500" id="poruka" placeholder="Vaša poruka"></textarea>
                </div>
                <button class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition duration-300" type="submit">Pošalji</button>
            </form>
            <!-- Kontakt informacije -->
            <div class="flex-1 flex flex-col space-y-4">
                <div class="flex items-center space-x-4">
                    <svg class="w-6 h-6 text-gray-600" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M3 5a2 2 0 012-2h3.586A1 1 0 0010 4.414l9.293 9.293a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0L7 10.414A1 1 0 006.586 10H5a2 2 0 01-2-2V5z"/>
                        <path d="M21 15v4a2 2 0 01-2 2h-4"/>
                    </svg>
                    <span class="text-gray-700">+381 12 345 678</span>
                </div>
                <div class="flex items-center space-x-4">
                    <svg class="w-6 h-6 text-gray-600" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M4 4h16v16H4V4z"/>
                        <path d="M4 4l8 8 8-8"/>
                    </svg>
                    <span class="text-gray-700">info@vasadomena.com</span>
                </div>
                <div class="flex items-center space-x-4">
                    <svg class="w-6 h-6 text-gray-600" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 2C8.13 2 5 5.13 5 9c0 4.25 3.75 9 7 13 3.25-4 7-8.75 7-13 0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5S10.62 6.5 12 6.5 14.5 7.62 14.5 9 13.38 11.5 12 11.5z"/>
                    </svg>
                    <span class="text-gray-700">Beograd, Srbija</span>
                </div>
            </div>
        </div>
    </div>
@endsection

