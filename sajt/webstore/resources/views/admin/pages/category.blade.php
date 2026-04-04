@extends('layouts.admin')

@section('content')
    <div class="max-w-xl mx-auto px-4 py-8">

        <div class="bg-white shadow-md rounded-2xl p-6">

            <h2 class="text-xl text-center font-semibold mb-6 text-gray-800">
                {{$isEdit ? "Edit" : "Add"}} category
            </h2>

            <form action="{{ $isEdit
                ? route('admin.category.update', $category->id)
                : route('admin.category.store') }}"  method="POST" class="space-y-5">
                @csrf

                @if($isEdit)
                    @method('PATCH')
                @endif

                @if(isset($parentID))
                    <input type="hidden" name="parent_id" value="{{ $parentID }}">
                @endif

                <!-- TEXT INPUT -->
                <div class="max-w-md mx-auto">
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Category Name
                    </label>
                    <input type="text" name="name" value="{{ $isEdit ? $category->name : "" }}"
                           class="w-full border border-gray-300 text-blue-700 font-bold rounded-xl px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                           placeholder="Enter category name">
                </div>

                <!-- SUBMIT -->
                <div class="max-w-md mx-auto text-center">
                    <button type="submit"
                            class="bg-blue-700 text-white px-5 py-2 rounded-xl shadow-md
                   hover:bg-blue-800 transition w-full cursor-pointer">

                        {{ $isEdit ? "Edit" : "Insert" }}
                    </button>
                </div>

            </form>

            @if($errors->any())
                <div class="my-4">
                    <ul class="list-unstyled italic text-center text-red-700">
                        @foreach($errors->all() as $e)
                            <li>{{ $e }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

        </div>

    </div>
@endsection
