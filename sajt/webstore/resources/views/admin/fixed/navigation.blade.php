<nav class="bg-blue-700 text-white">
    <div class="max-w-7xl mx-auto px-4">
        <div class="flex justify-between h-16 items-center">

            <!-- Logo -->
            <div class="flex-shrink-0 text-xl font-bold italic">
                <a href="{{ route('admin.dashboard') }}">AdminPanel</a>
            </div>

            <!-- Desktop Menu -->
            <div class="hidden md:flex items-center space-x-6">
                <a href="{{ route('admin.product') }}" class="hover:text-gray-300">Add product</a>
                <a href="{{ route('admin.categories.index') }}" class="hover:text-gray-300">Categories</a>
                <a href="{{ route('admin.specifications.index') }}" class="hover:text-gray-300">Specifications</a>

                <!-- Account ikonica -->
                <i id="acc-icon"
                   class="fa-solid fa-circle-user fa-xl cursor-pointer ml-4 hover:text-gray-300">
                </i>
            </div>

            <!-- Hamburger -->
            <div class="md:hidden">
                <i id="menu-btn" class="fa-solid fa-bars fa-xl cursor-pointer"></i>
            </div>


        </div>
    </div>

    <!-- Mobile Menu -->
    <div id="mobile-menu" class="hidden md:hidden px-4 pb-4">
        <a href="#" class="block py-2">Categories</a>
        <a href="#" class="block py-2">About</a>
        <a href="#" class="block py-2">Services</a>
        <a href="#" class="block py-2">Contact</a>
        <div class="border-t border-blue-500 mt-3 pt-3">

            <!-- Account ikonica (mobile) -->
            <div class="flex items-center justify-between">
                <span class="italic acc-title">Account</span>
                <i id="acc-icon-mobile"
                   class="fa-solid fa-circle-user fa-xl cursor-pointer hover:text-gray-300">
                </i>
            </div>

            <!-- Mobile dropdown -->
            <div id="user-menu-mobile" class="hidden mt-2 bg-blue-700 text-white rounded shadow">

                @if(session()->has('username'))
                    <form action="{{ route('home') }}" method="GET">
                        @csrf
                        <button type="submit"
                                class="cursor-pointer transition w-full text-left px-3 py-2 hover:bg-blue-600">
                            Home&nbsp;&nbsp;
                            <i class="fa-solid fa-house-chimney"></i>
                        </button>
                    </form>

                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit"
                                class="cursor-pointer transition w-full text-left px-3 py-2 hover:bg-blue-600">
                            Log out&nbsp;&nbsp;&nbsp; <i class="fa-solid fa-right-from-bracket fa-lg"></i>
                            <i class="curofa-solid fa-right-from-bracket ml-2"></i>
                        </button>
                    </form>
                @endif

            </div>
        </div>
    </div>


    <div id="user-menu"
         class="hidden absolute right-4 top-16 w-44 bg-blue-700 text-white border rounded shadow-lg z-50">

        @if(session()->has('username'))
            <form action="{{ route('home') }}" method="GET">
                @csrf
                <button type="submit"
                        class="cursor-pointer transition w-full text-left px-3 py-2 hover:bg-blue-600">
                    Home&nbsp;&nbsp;
                    <i class="fa-solid fa-house-chimney"></i>
                </button>
            </form>

            <form action="{{ route('logout') }}" method="POST" class="block">
                @csrf
                <button type="submit"
                        class="cursor-pointer w-full text-left px-3 py-2 hover:bg-blue-600">
                    Log out&nbsp;&nbsp;
                    <i class="fa-solid fa-right-from-bracket fa-lg"></i>
                </button>
            </form>
        @else
            <a href="{{ route('login') }}"
               class="block px-3 py-2 hover:bg-blue-600">
                Log in&nbsp;&nbsp;
                <i class="fa-solid fa-right-to-bracket fa-lg"></i>
            </a>
        @endif

    </div>

</nav>


