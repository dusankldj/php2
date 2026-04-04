@extends('layouts.admin')

@section('content')
    <div class="max-w-6xl mx-auto px-4 py-8">

        <h1 class="text-2xl font-bold mb-6 text-gray-800">
            Specifications
        </h1>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

            @foreach($categories as $category)
                <div class="bg-white shadow-md rounded-2xl overflow-hidden flex flex-col min-h-[260px]">

                    <input type="hidden" id="csrf-token" value="{{ csrf_token() }}">

                    <!-- CONTENT (rasteže se) -->
                    <div class="flex-1">
                        <table class="w-full text-sm text-left">

                            <!-- HEADER -->
                            <thead>
                            <tr class="bg-blue-700 text-white">
                                <th class="px-4 py-3 font-semibold">
                                    {{ $category->name }}
                                </th>
                            </tr>
                            </thead>

                            <!-- BODY -->
                            <tbody class="bg-gray-50">

                            @forelse($category->specifications as $spec)
                                <tr class="border-b hover:bg-gray-100 transition group">
                                    <td class="px-4 py-2">
                                        <div class="flex justify-between items-center">

                                            <span>{{ $spec->name }}</span>

                                            <i class="deleteSpec fa-solid fa-trash-can fa-lg text-gray-500 cursor-pointer
                                                opacity-0 group-hover:opacity-100 transition hover:text-red-500"
                                               data-id="{{ $spec->id }}" data-category="{{ $category->id }}">
                                            </i>

                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td class="px-4 py-2 text-gray-400 italic text-center">
                                        No specifications
                                    </td>
                                </tr>
                            @endforelse

                            </tbody>

                        </table>
                    </div>

                    <!-- PLUS (uvek dole) -->
                    <div class="bg-blue-700 text-center py-3 mt-auto">
                        <a href="{{ route('admin.specifications.create', ['category_id' => $category->id]) }}"
                           class="inline-block text-white text-lg cursor-pointer hover:scale-110 transition"
                           title="Add specification">
                            <i class="fa-solid fa-plus"></i>
                        </a>
                    </div>

                </div>
            @endforeach

        </div>

    </div>
@endsection
