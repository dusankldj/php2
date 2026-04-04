@extends('layouts.admin')

@section('content')
    <div class="min-h-[60vh] flex items-center justify-center px-4">

        <div class="w-full max-w-md bg-white shadow-md rounded-2xl p-6">

            <h2 class="text-xl font-semibold text-center text-gray-800 mb-6">
                Add Specification
            </h2>

            <form action="{{ route('admin.specifications.store', ["category_id"=>$category_id]) }}" method="POST" class="flex flex-col items-center gap-5">
                @csrf

                <input type="hidden" name="category_id" value="{{ $category_id }}">

                <!-- TEXT INPUT -->
                <div class="w-full">
                    <input type="text" name="name"
                           class="w-full border text-blue-700 font-bold border-gray-300 rounded-xl px-4 py-2 text-center
                              focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                           placeholder="Enter specification name">
                </div>

                <!-- SUBMIT -->
                <button type="submit"
                        class="cursor-pointer bg-blue-700 text-white px-6 py-2 rounded-xl shadow-md
                           hover:bg-blue-800 transition w-full sm:w-auto">
                    Insert
                </button>

            </form>

            @if($errors->any())
                <div class="my-3 mt-4">
                    <ul class="list-unstyled italic text-red-700 text-center">
                        @foreach($errors->all() as $e)
                            <li>{{ $e }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>

    </div>
@endsection
