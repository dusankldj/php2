@extends('layouts.app')

@section('content')
    <div class="flex justify-center my-5 mb-7">
        <div class="max-w-3xl w-full bg-white p-8 rounded-lg shadow-lg text-center">

            <h1 class="text-3xl font-bold mb-6 text-gray-800">Contact Us</h1>

            <form class="space-y-6 text-left" method="POST" action="{{ route('contact') }}">
                @csrf
                <!-- First + Last name -->
                <div class="flex flex-col md:flex-row gap-4">
                    <div class="w-full">
                        <label class="block mb-1 font-medium text-gray-700">First Name</label>
                        <input type="text" value="{{ old('first_name') }}"
                               class="font-bold text-blue-700 w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                               placeholder="John" name="first_name">
                    </div>

                    <div class="w-full">
                        <label class="block mb-1 font-medium text-gray-700">Last Name</label>
                        <input type="text" value="{{ old('last_name') }}"
                               class="font-bold text-blue-700 w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                               placeholder="Smith" name="last_name">
                    </div>
                </div>

                <!-- Email (poseban red) -->
                <div>
                    <label class="block mb-1 font-medium text-gray-700">Email</label>

                    <input type="email"
                           name="email"
                           value="{{ auth()->check() && auth()->user()->role->name == 'user'
                            ? auth()->user()->email
                            : old('email') }}"

                           @if(auth()->check() && auth()->user()->role->name == 'user')
                               disabled
                           @endif

                           class="font-bold text-blue-700 w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                           placeholder="john@example.com">
                </div>
                <!-- skriveni input, mora ako je korisnik ulogvan jer disabled se ne salje kroz -->
                @if(auth()->check() && auth()->user()->role->name == 'user')
                    <input type="hidden" name="email" value="{{ auth()->user()->email }}">
                @endif

                <!-- Message (poseban red) -->
                <div>
                    <label class="block mb-1 font-medium text-gray-700">Message</label>
                    <textarea
                        class="font-bold text-blue-700 w-full border border-gray-300 rounded px-3 py-2 min-h-[120px] focus:outline-none focus:ring-2 focus:ring-blue-500"
                        placeholder="Your message..." name="message">{{ old('message') }}</textarea>
                </div>

                <!-- Submit -->
                <div class="text-center">
                    <input type="submit"
                           value="Send Message"
                           @if(auth()->check() && auth()->user()->role->name == 'admin')
                               disabled
                           @endif
                           class="bg-blue-700 text-white px-6 py-2 rounded hover:bg-blue-800 transition duration-300 cursor-pointer disabled:bg-gray-400 disabled:cursor-not-allowed">
                </div>

            </form>

            @if($errors->any())
                <div class="my-3 mt-5 text-center">
                    <ul class="list-unstyled italic text-red-700 font-bold">
                        @foreach($errors->all() as $e)
                            <li>{{ $e }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    </div>
@endsection
