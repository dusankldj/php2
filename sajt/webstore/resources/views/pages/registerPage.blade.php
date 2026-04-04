@extends('layouts.app')

@section('content')
    <section class="flex justify-center px-4 py-12">

        <div class="w-full max-w-md bg-white shadow-lg rounded-lg p-6">

            <h2 class="text-2xl font-bold mb-6 text-center">
                Register
            </h2>

            <form class="flex flex-col gap-4" method="POST" action="{{ route('register') }}">
                @csrf
                <!-- Name + Surname (u jednom redu na većim ekranima) -->
                <div class="flex flex-col sm:flex-row gap-4">

                    <input
                        name="name"
                        type="text"
                        placeholder="Name"
                        class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    />

                    <input
                        name="surname"
                        type="text"
                        placeholder="Surname"
                        class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    />

                </div>

                <!-- Username -->
                <input
                    name="username"
                    type="text"
                    placeholder="Username"
                    class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                />

                <!-- Email -->
                <input
                    name="email"
                    type="email"
                    placeholder="Email"
                    class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                />

                <!-- Password -->
                <input
                    name="password"
                    type="password"
                    placeholder="Password"
                    class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                />

                <!-- Login link -->
                <a href="{{ url('/login') }}"
                   class="text-sm text-blue-600 underline underline-offset-4 hover:text-blue-800 text-center">
                    Already have an account? Login!
                </a>


                <input type="submit"
                       class="cursor-pointer bg-blue-700 text-white py-2 rounded font-semibold hover:bg-blue-800 transition active:scale-95"
                       value="Register"/>

            </form>
            @if($errors->any())
                <div class="mt-3 text-center">
                    <ul class="list-unstyled">
                        @foreach ($errors->all() as $error)
                            <li class="italic text-red-700">{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    </section>
@endsection
