<header>
    <nav class="flex container mx-auto justify-between  w-screen">
        <div class="py-6 px-3 md:px-0 flex w-full items-center ">
            <a class="text-3xl font-bold font-heading" href="/">
                <h1 class="uppercase text-2xl "><span class="bg-green-500 p-2 text-white">tourist</span> guide</h1>
            </a>
            <!-- Nav Links -->
            <ul class="hidden md:flex px-4 mx-auto font-semibold font-heading space-x-12 capitalize">
                <li><a class="hover:text-green-400 pl-2 {{ Request::is('/') ? 'font-bold border-l-4 border-green-500' : ''}}" href="/">Home</a></li>
                <li><a class="hover:text-green-400 pl-2 {{ Request::is('places') ? 'font-bold border-l-4 border-green-500' : ''}}" href="{{ route('places.index') }}">Places</a></li>
                @if (Auth::user())
                    @if (Auth::user()->role == 'admin')
                        <li><a class="hover:text-green-400" href="{{ route('admin.index') }}">Admin</a></li>
                    @endif
                @endif
            </ul>
            <!-- Header Icons -->
            <div class="hidden md:flex items-center space-x-5 ">

                @if (Auth::user())
                    <button id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbar"
                        class="mr-3 flex items-center w-full md:w-auto ">
                        <h1 class="mr-2 text-ld font-bold">{{ Auth::user()->username }}</h1>
                        <div class=" bg-green-400 rounded-full " style="width: 45px; height: 45px">
                            <img class="rounded-full"  src="{{ Auth::user()->image  }}"
                                alt="">
                        </div>
                    </button>

                    <div id="dropdownNavbar" class="hidden top-20 w-72  right-0 absolute z-50">
                        <div class="bg-white shadow-lg rounded-xl">
                            <div
                                class="bg-gradient-to-r from-green-700 to-green-600 transform flex items-center mb-5 py-4 px-6">
                                <div class="ml-5">
                                    <h1 class="text-white tracking-wide text-lg">
                                        {{ Auth::user()->firstname . ' ' . Auth::user()->lastname }}</h1>
                                    <p class="text-gray-300 tracking-wider text-sm">{{ Auth::user()->email }}</p>
                                </div>
                            </div>

                            <ul class="px-8 relative pb-5">
                                <li class=" text-gray-900 text-md py-2"><a
                                        class="flex items-center hover:text-green-400"
                                        href="{{ route('favorites.index') }}">
                                        <i class="bx bx-heart text-xl mr-5"></i>Favorite</a>
                                </li>
                                <li class=" text-gray-900 text-md py-2"><a
                                        class="flex items-center hover:text-green-400"
                                        href="{{ route('user.show', Auth::user()->firstname) }}">
                                        <i class="bx bx-log-out-circle text-xl mr-5"></i>Logout</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                @else
                    <a class="flex justify-between w-28 pl-4 rounded-full text-xl border border-green-400 font-bold "
                        href="{{ route('user.index') }}">
                        Login
                        <i class="bx bx-lock-open-alt text-2xl pr-2 text-green-500"></i>
                    </a>
                @endif

            </div>
        </div>

        <button type="button" data-collapse-toggle="navbar" class="navbar-burger self-center mr-12 md:hidden">
            <i class="bx bx-menu text-3xl hover:text-green-500"></i>
        </button>

        <div id="navbar" class="hidden md:hidden top-20 w-72  right-0 absolute z-50">
            <div class="bg-white shadow-lg rounded-xl">
                @if (Auth::user())
                    <div
                        class="bg-gradient-to-r from-green-700 to-green-600 transform flex items-center mb-10 py-8 px-6">
                        <img class="rounded-full w-14 h-14 ring-4 ring-opacity-80 ring-gray-200"
                        src="{{ Auth::user()->image  }}" alt="Avatar Photo">
                        <div class="ml-5">
                            <h1 class="text-white tracking-wide text-lg">
                                {{ Auth::user()->firstname . ' ' . Auth::user()->lastname }}</h1>
                            <p class="text-gray-300 tracking-wider text-sm">{{ Auth::user()->email }}</p>
                        </div>
                    </div>

                    <ul class="px-8 relative pb-5">
                        <h1>User Route </h1>
                        @if (Auth::user()->role == 'admin')
                            <li class=" text-gray-900 text-md py-2"><a class="flex items-center hover:text-green-400"
                                    href="{{ route('admin.index') }}">
                                    <i class="bx bx-user text-xl mr-5"></i>Admin</a>
                            </li>
                        @endif
                        <li class=" text-gray-900 text-md py-2"><a class="flex items-center hover:text-green-400"
                                href="{{ route('favorites.index') }}">
                                <i class="bx bx-heart text-xl mr-5"></i>Favorite</a>
                        </li>
                        <li class=" text-gray-900 text-md py-2"><a class="flex items-center hover:text-green-400"
                                href="{{ route('user.show', Auth::user()->firstname) }}">
                                <i class="bx bx-log-out-circle text-xl mr-5"></i>Logout</a>
                        </li>
                    </ul>
                @else
                    <div class=" flex items-center justify-center py-4 px-6">
                        <a class="flex justify-between w-28 pl-4 rounded-full text-xl border border-green-400 font-bold "
                            href="{{ route('user.index') }}">
                            Login
                            <i class="bx bx-lock-open-alt text-2xl pr-2 text-green-500"></i>
                        </a>
                    </div>
                @endif
                <ul class="px-8 relative pb-5">
                    <h1>Route </h1>
                    <li class=" text-gray-900 text-md py-2"><a class="flex items-center hover:text-green-400"
                            href="/">
                            <i class="bx bx-home text-xl mr-5"></i>Home</a>
                    </li>
                    <li class=" text-gray-900 text-md py-2"><a class="flex items-center hover:text-green-400"
                            href="{{ route('places.index') }}">
                            <i class="bx bx-landscape text-xl mr-5 "></i>
                            Places</a>
                    </li>
                </ul>
            </div>
        </div>

    </nav>

</header>
