<nav class="bg-white shadow-md">

    <div class="max-w-7xl mx-auto px-4">
        <div class="flex justify-between items-center h-16">

            <!-- Logo -->
            <div class="italic text-2xl font-bold text-blue-700">
                Webstore
            </div>

            <!-- Desktop links -->
            <div class="hidden md:flex space-x-8">
                <a href="{{ url('/') }}" class="text-gray-700 hover:text-blue-600">Home</a>
                <a href="{{ url('/store') }}" class="text-gray-700 hover:text-blue-600">Store</a>
                <a href="{{ url('/faq') }}" class="text-gray-700 hover:text-blue-600">FAQ</a>
                <a href="{{ url('/contact') }}" class="text-gray-700 hover:text-blue-600">Contact</a>
                <a href="{{ url('/author') }}" class="text-gray-700 hover:text-blue-600">Author</a>
            </div>

            <!-- Hamburger -->
            <button id="hamburgerBtn" class="md:hidden">
                <i class="fa-solid fa-bars fa-xl cursor-pointer"></i>
            </button>

        </div>
    </div>

    <!-- Mobile menu -->
    <div id="mobileMenu" class="overflow-hidden transition-all duration-300 max-h-0 md:hidden px-4 space-y-2 bg-white">
        <a href="{{ url('/') }}" class="block text-gray-700 hover:text-blue-700">Home</a>
        <a href="{{ url('/store') }}" class="block text-gray-700 hover:text-blue-700">Store</a>
        <a href="{{ url('/faq') }}" class="block text-gray-700 hover:text-blue-700">FAQ</a>
        <a href="{{ url('/contact') }}" class="block text-gray-700 hover:text-blue-700">Contact</a>
        <a href="{{ url('/author') }}" class="block text-gray-700 hover:text-blue-700">Author</a>
    </div>

    <!-- DONJI DEO (Search + Login) -->
    <div class="bg-gray-50 border-t">
        <div class="flex items-center py-3">

            <!-- Search (centriran i ograničen) -->
            <div class="max-w-7xl mx-auto px-4 flex-1">
                <div class="flex items-center max-w-2xl">
                    <input
                        id="searchField"
                        type="text"
                        placeholder="Search..."
                        class="flex-1 px-4 py-2 border rounded-l-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    />
                    <button id="searchButton" class="px-4 py-2 bg-gray-200 border border-l-0 rounded-r-lg hover:text-blue-700 transition cursor-pointer">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </button>
                </div>
            </div>

            <!-- Login skroz desno -->
            <div class="pr-6 relative">

                <a href="{{ session()->has('username') ? url('/cart') : url('/login')}}"
                   class="" id="cartIcon">
                    <i class="fa-solid fa-cart-shopping fa-xl cursor-pointer mx-1"></i>
                </a>

                <!-- USER ICON -->
                <i id="user-icon" class="fa-solid fa-circle-user fa-xl cursor-pointer mx-1"></i>

                <!-- DROPDOWN -->
                <div id="user-menu"
                     class="hidden absolute right-0 mt-2 w-40 bg-white border rounded shadow-lg">

                    @if(session()->has('username'))
                        <a href="{{ url('/profile') }}"
                           class="block px-2 py-2 hover:bg-gray-100">
                            {{session('username')}}&nbsp;&nbsp;
                            <i class="fa-solid fa-gear fa-lg cursor-pointer"></i>
                        </a>

                        @if(auth()->user()->role->name == 'admin')
                            <a href="{{ route('admin.dashboard') }}"
                               class="block px-2 py-2 hover:bg-gray-100">
                                Dashboard&nbsp;&nbsp;
                                <i class="fa-solid fa-tachograph-digital"></i>
                            </a>
                        @endif

                        <form action="{{ route('logout') }}" method="POST" class="block">
                            @csrf
                            <button type="submit" class="cursor-pointer w-full text-left px-2 py-2 hover:bg-gray-100">
                                Log out&nbsp;&nbsp;
                                <i class="fa-solid fa-right-from-bracket fa-lg"></i>
                            </button>
                        </form>
                    @else
                        <a href="{{ route('login') }}"
                           class="block px-2 py-2 hover:bg-gray-100 cursor-pointer">
                            Log in&nbsp;&nbsp;
                            <i class="fa-solid fa-right-to-bracket fa-lg"></i>
                        </a>
                    @endif

                </div>

            </div>

        </div>
    </div>

</nav>
