
<!-- proveiti koju komponentu ukljuciti -->
<div>
    <!-- MOBILE DROPDOWN -->
    <div class="md:hidden w-full my-4">
        <select class="w-3/4 block mx-auto border border-gray-300 rounded px-3 py-2">
            <option selected>Category</option>

            @foreach($categories as $category)
                <option>{{ $category->name }}</option>
            @endforeach

        </select>
    </div>

    <!-- DESKTOP SIDEBAR -->
    <aside class="w-64 bg-gray-100 p-4 hidden md:block">
        <ul class="space-y-2">

            @foreach($categories as $category)
                <li class="menu-item" id="aside-menu">
                    <a href="{{ route('store', ['category'=>$category->id]) }}" data-id="{{ $category->id }}"
                       class="categoryMenu block px-3 py-2 rounded hover:bg-blue-700 hover:text-white">
                        {{ $category->name }}
                    </a>

                    @if($category->children->count())
                        <div class="submenu hidden pl-6 mt-2">
                            <ul class="space-y-1 text-sm">
                                @foreach($category->children as $child)
                                    <li>
                                        <a href="{{ route('store', ['category'=>$child->id]) }}" data-id="{{ $child->id }}" class="categoryMenu block py-1 hover:text-blue-600">
                                            {{ $child->name }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                </li>
            @endforeach

        </ul>
    </aside>
</div>
