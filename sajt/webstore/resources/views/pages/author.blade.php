@extends('layouts.app')

@section('content')
    <section class="my-12 px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col md:flex-row items-center md:items-start md:justify-between gap-6">

            <div class="md:w-1/2 text-left">
                <h3 class="text-2xl font-bold mb-2">Student: Dušan Đokić</h3>
                <p class="text-gray-700 italic">Index: 131/22</p>
                <a href="{{ asset('dokumentacija.docx') }}" target="_blank">Documentation:&nbsp;&nbsp;<i class="fa-solid fa-file fa-lg"></i></a>
            </div>

            <div class="md:w-1/2 flex justify-center md:justify-end">
                <img src="{{ asset('storage/author/me.jpg') }}"
                     alt="author"
                     class="w-4/5 sm:w-4/5 md:w-3/4 lg:w-2/3 rounded-lg shadow-lg object-cover">
            </div>

        </div>
    </section>
@endsection
