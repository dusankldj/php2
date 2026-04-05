@extends('layouts.admin')

@section('content')
    <div class="max-w-4xl mx-auto px-6 py-10">

        <!-- Welcome -->
        <h1 class="text-4xl md:text-5xl font-bold text-gray-800 mb-6">
            Welcome to the dashboard, {{ auth()->user()->name }}!
        </h1>

        <!-- Description -->
        <p class="text-lg text-gray-600 mb-4">
            You are currently in the <span class="font-semibold text-gray-800">admin panel</span>.
            From here, you can navigate through different sections of the application and manage various features of the system.
        </p>

        <p class="text-lg text-gray-600 mb-4">
            Using the navigation menu, you are able to control and organize important parts of the website such as products, content, and other resources.
        </p>

        <!-- Important note -->
        <div class="bg-yellow-100 border-l-4 border-yellow-500 text-yellow-800 p-4 rounded mt-6">
            <p class="font-semibold">
                Important:
            </p>
            <p>
                To <span class="font-bold">edit or delete products</span>, you must return to the
                <span class="font-bold">store page while logged in as an administrator</span>.
                <br/>You can go to account icon while there, then click "home" and navigate yourselft to store page.
            </p>
        </div>

    </div>
@endsection



