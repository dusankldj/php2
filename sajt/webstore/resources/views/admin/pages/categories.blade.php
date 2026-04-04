@extends('layouts.admin')

@section('content')
    <div class="max-w-6xl mx-auto px-4 py-8">

        <h1 class="text-2xl font-bold text-gray-800">
            Categories
        </h1>

        <a href="{{ route('admin.category.create') }}" class="bg-blue-700 text-white px-5 py-2 rounded-xl shadow-md my-4 mb-7
                  hover:bg-blue-800 transition inline-flex items-center gap-2">
            <i class="fa-solid fa-plus"></i>
            <span>Add supercategory</span>
        </a>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <input type="hidden" id="csrf-token" value="{{ csrf_token() }}">

            @foreach($categories->whereNull('parent_id') as $parent)
                <div class="bg-white shadow-md rounded-2xl overflow-hidden flex flex-col min-h-[250px]">

                    <!-- Tabela -->
                    <div class="flex-1">
                        <table class="w-full text-sm text-left">

                            <!-- Header -->
                            <thead>
                            <tr class="bg-blue-700 text-white">
                                <th class="px-4 py-3 font-semibold">
                                    <div class="flex justify-between items-center">
                                        <span>{{ $parent->name }}</span>

                                        <div class="flex gap-3">
                                            <a href="{{ route('admin.category.edit', $parent->id) }}"><i class="fa-solid fa-pen-to-square fa-lg cursor-pointer hover:text-gray-200"></i></a>
                                            <a href="" class="deleteCategory" data-id="{{ $parent->id }}" data-parent="true"><i class="fa-solid fa-trash-can fa-lg cursor-pointer hover:text-red-300"></i></a>
                                        </div>
                                    </div>
                                </th>
                            </tr>
                            </thead>

                            <!-- Podkategorije -->
                            <tbody class="bg-gray-50">
                            @forelse($parent->children as $child)
                                <tr class="border-b hover:bg-gray-100 transition group">
                                    <td class="px-4 py-2">
                                        <div class="flex justify-between items-center">

                                            <!-- ime -->
                                            <span>{{ $child->name }}</span>

                                            <i class="deleteCategory fa-solid fa-trash-can fa-lg text-gray-500 cursor-pointer
                                            opacity-0 group-hover:opacity-100 transition hover:text-red-500" data-id="{{ $child->id }}" data-parent="false">
                                            </i>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td class="px-4 py-2 text-gray-400 italic">
                                        No subcategories
                                    </td>
                                </tr>
                            @endforelse
                            </tbody>

                        </table>
                    </div>

                    <!-- PLUS + -->
                    <div class="bg-blue-700 text-center py-3">
                        <a href="{{ route('admin.category.create', ["parent_id" => $parent->id]) }}"><i class="fa-solid fa-plus text-white text-lg cursor-pointer hover:scale-110 transition"
                           title="Add a subcategory"></i></a>
                    </div>

                </div>
            @endforeach

        </div>
    </div>
@endsection
