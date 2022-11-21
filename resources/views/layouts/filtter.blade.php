<div class="md:container mx-auto w-screen flex justify-center p-5 mt-10 relative">

    <div class=" lg:w-5/6 w-full bg-gray-100 p-10 rounded-md">
        @if ($page == 'admin')
            <div class="flex justify-between">
                <h2 class="text-lg font-medium truncate mb-10">Places</h2>
                <a href="{{ route('places.create') }}"
                    class="mr-5 h-10 px-4 rounded-full flex items-center text-lg text-white bg-green-500">Create +</a>
            </div>
        @endif


        <form
            action="@if ($page == 'favorites') {{ route('favorites.index') }}
            @elseif ($page == 'user')
            {{ route('places.index') }}
            @else
            {{ route('admin.show', 'places') }} @endif  "
            method="GET">
            <div class="relative">
                <div class="absolute flex items-center ml-2 h-full">
                    <i class="bx bx-search"></i>
                </div>

                <input type="text" placeholder="Search by Name"
                    class="px-8 py-3 w-full rounded-md  border focus:border-green-500 focus:outline-none text-sm">
            </div>
            <div class="flex items-center justify-between mt-4">
                <p class="font-medium">
                    Filters
                </p>

                <div>
                    <input type="submit" value="Filter"
                        class="px-4 py-2 mr-2 bg-green-400 hover:bg-green-500 text-white text-sm font-medium rounded-md">

                    <a href="@if ($page == 'favorites') {{ route('favorites.index') }}
                    @elseif ($page == 'user')
                    {{ route('places.index') }}
                    @else
                    {{ route('admin.show', 'places') }} @endif"
                        class="px-4 py-2 bg-white hover:bg-gray-200 text-gray-800 text-sm font-medium rounded-md">
                        Reset Filter
                    </a>
                </div>
            </div>


            <div>
                <div class="grid grid-cols-2 md:grid-cols-3 xl:grid-cols-4 gap-4 mt-4">
                    <select name="type"
                        class="px-4 py-3 w-full rounded-md border focus:border-green-500 focus:outline-none text-sm">
                        <option value="">All Type</option>
                        <option value="Shopping"
                            {{ request()->get('type') != null ? (request()->get('type') == 'Shopping' ? 'selected' : '') : '' }}>
                            Shopping</option>
                        <option value="Mall"
                            {{ request()->get('type') != null ? (request()->get('type') == 'Mall' ? 'selected' : '') : '' }}>
                            Mall</option>
                        <option value="Coffee Shops"
                            {{ request()->get('type') != null ? (request()->get('type') == 'Coffee Shops' ? 'selected' : '') : '' }}>
                            Coffee Shops</option>
                        <option value="Park"
                            {{ request()->get('type') != null ? (request()->get('type') == 'Park' ? 'selected' : '') : '' }}>
                            Park</option>
                        <option value="Attractions"
                            {{ request()->get('type') != null ? (request()->get('type') == 'Attractions' ? 'selected' : '') : '' }}>
                            Attractions</option>
                        <option value="Museums"
                            {{ request()->get('type') != null ? (request()->get('type') == 'Museums' ? 'selected' : '') : '' }}>
                            Museums</option>
                        <option value="History"
                            {{ request()->get('type') != null ? (request()->get('type') == 'History' ? 'selected' : '') : '' }}>
                            History</option>
                    </select>

                    <select name="city"
                        class="px-4 py-3 w-full rounded-md border focus:border-green-500 focus:outline-none text-sm">
                        <option value="">City</option>
                        <option value="erbil"
                            {{ request()->get('city') != null ? (request()->get('city') == 'erbil' ? 'selected' : '') : '' }}>
                            Erbil</option>
                        <option value="duhok"
                            {{ request()->get('city') != null ? (request()->get('city') == 'duhok' ? 'selected' : '') : '' }}>
                            Duhok</option>
                        <option value="sulaymaniyah"
                            {{ request()->get('city') != null ? (request()->get('city') == 'sulaymaniyah' ? 'selected' : '') : '' }}>
                            Sulaymaniyah</option>
                    </select>

                    <select name="sort"
                        class="px-4 py-3 w-full rounded-md border focus:border-green-500 focus:outline-none text-sm">
                        <option value="">Sort</option>
                        <option value="asc" selected>A - Z</option>
                        <option value="desc"
                            {{ request()->get('sort') != null ? (request()->get('sort') == 'desc' ? 'selected' : '') : '' }}>
                            Z - A</option>
                    </select>
                </div>
            </div>
        </form>
    </div>
</div>
