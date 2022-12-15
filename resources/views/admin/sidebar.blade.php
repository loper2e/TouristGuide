<div class="w-56 bg-gray-100 rounded-r-3xl overflow-hidden h-full">
    <div class="flex items-center justify-center h-20 shadow-md">
        <a href="/">
            <h1 class="uppercase text-2xl "><span class="bg-green-500 p-2 text-white">tourist</span> guide</h1>
        </a>
    </div>
    <ul class="py-4">
        <div class="text-sm font-light tracking-wide text-gray-500 ml-4">Menu</div>
        <li>
            <a href="/admin"
                class="flex items-center h-12 transform hover:translate-x-2 transition-transform ease-in duration-200 text-gray-500 hover:text-green-400">
                <span class="inline-flex items-center justify-center h-12 w-12 text-lg text-gray-400"><i
                        class="bx bx-home"></i></span>
                <span class="text-sm font-medium">Dashboard</span>
            </a>
        </li>
        <li>
            <a href="{{ route('admin.show', 'places') }}"
                class="flex flex-row items-center h-12 transform hover:translate-x-2 transition-transform ease-in duration-200 text-gray-500 hover:text-green-400">
                <span class="inline-flex items-center justify-center h-12 w-12 text-lg text-gray-400"><i
                        class="bx bx-landscape"></i></span>
                <span class="text-sm font-medium">Places</span>
            </a>
        </li>
        <li>
            <a href="{{ route('admin.show', 'users') }}"
                class="flex flex-row items-center h-12 transform hover:translate-x-2 transition-transform ease-in duration-200 text-gray-500 hover:text-green-400">
                <span class="inline-flex items-center justify-center h-12 w-12 text-lg text-gray-400"><i
                        class="bx bx-group"></i></span>
                <span class="text-sm font-medium">Users</span>
            </a>
        </li>
        <li>
            <a href="{{ route('admin.show', 'support') }}"
                class="flex flex-row items-center h-12 transform hover:translate-x-2 transition-transform ease-in duration-200 text-gray-500 hover:text-green-400">
                <span class="inline-flex items-center justify-center h-12 w-12 text-lg text-gray-400"><i
                        class="bx bx-support"></i></span>
                <span class="text-sm font-medium">Supports</span>
            </a>
        </li>
        <div class="text-sm font-light tracking-wide text-gray-500 ml-4">Settings</div>
        <li>
            @if (Auth::user())
                <a href="{{ route('user.show', Auth::user()->firstname) }}"
                    class="flex flex-row items-center h-12 transform hover:translate-x-2 transition-transform ease-in duration-200 text-gray-500 hover:text-green-400">
                    <span class="inline-flex items-center justify-center h-12 w-12 text-lg text-gray-400"><i
                            class="bx bx-log-out"></i></span>
                    <span class="text-sm font-medium">logout</span>
                </a>
            @endif
        </li>
    </ul>
</div>
