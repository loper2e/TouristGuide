<div class="mt-8 w-full p-20">
    <h2 class="text-lg font-medium truncate">Dashboard</h2>
    <div class="flex justify-around mt-5 w-full">
        <a class="w-2/6 m-1 transform  hover:scale-105 transition duration-300 shadow-xl rounded-lg bg-white"
            href="#">
            <div class="p-5 ">
                <div class="flex justify-between">
                    <i class="bx bx-group text-2xl"></i>
                    <div
                        class="{{ $data['deffusercount'] > 0 ? 'bg-green-500' : 'bg-red-500' }} rounded-full h-6 px-2 flex justify-items-center text-white font-semibold text-sm">
                        <span class="flex items-center">{{ $data['deffusercount'] }}%</span>
                    </div>
                </div>
                <div class="ml-2 w-full flex-1">
                    <div>
                        <div class="mt-3 text-3xl font-bold leading-8">{{ $data['usercount'] }}</div>

                        <div class="mt-1 text-base text-gray-600">Users</div>
                    </div>
                </div>
            </div>
        </a>
        <a class="w-2/6 m-1 transform  hover:scale-105 transition duration-300 shadow-xl rounded-lg bg-white"
            href="#">
            <div class="p-5 ">
                <div class="flex justify-between">
                    <i class="bx bx-compass text-2xl"></i>
                    <div
                        class="{{ $data['deffplacescount'] > 0 ? 'bg-green-500' : 'bg-red-500' }} rounded-full h-6 px-2 flex justify-items-center text-white font-semibold text-sm">
                        <span class="flex items-center">{{ $data['deffplacescount'] }}%</span>
                    </div>
                </div>
                <div class="ml-2 w-full flex-1">
                    <div>
                        <div class="mt-3 text-3xl font-bold leading-8">{{ $data['placescount'] }}</div>

                        <div class="mt-1 text-base text-gray-600">Places</div>
                    </div>
                </div>
            </div>
        </a>
        <a class="w-2/6 m-1 transform  hover:scale-105 transition duration-300 shadow-xl rounded-lg bg-white"
            href="#">
            <div class="p-5">
                <div class="flex justify-between">
                    <i class="bx bx-list-ul text-2xl"></i>
                    <div
                        class="{{ $data['defffavoritelistcount'] > 0 ? 'bg-green-500' : 'bg-red-500' }} rounded-full h-6 px-2 flex justify-items-center text-white font-semibold text-sm">
                        <span class="flex items-center">{{ $data['defffavoritelistcount'] }}%</span>
                    </div>
                </div>
                <div class="ml-2 w-full flex-1">
                    <div>
                        <div class="mt-3 text-3xl font-bold leading-8">{{ $data['favoritelistcount'] }}</div>

                        <div class="mt-1 text-base text-gray-600">Favorite Lists</div>
                    </div>
                </div>
            </div>
        </a>
        <a class="w-2/6 m-1 transform  hover:scale-105 transition duration-300 shadow-xl rounded-lg bg-white"
            href="#">
            <div class="p-5">
                <div class="flex justify-between">
                    <i class="bx bx-star text-2xl"></i>
                    <div
                    class="{{ $data['deffreviewcount'] > 0 ? 'bg-green-500' : 'bg-red-500' }} rounded-full h-6 px-2 flex justify-items-center text-white font-semibold text-sm">
                    <span class="flex items-center">{{ $data['deffreviewcount'] }}%</span>
                </div>
                </div>
                <div class="ml-2 w-full flex-1">
                    <div>
                        <div class="mt-3 text-3xl font-bold leading-8">{{ $data['reviewcount'] }}</div>

                        <div class="mt-1 text-base text-gray-600">Reviews</div>
                    </div>
                </div>
            </div>
        </a>
    </div>


    <div class=" min-w-full overflow-hidden align-middle border-b border-gray-200 shadow sm:rounded-lg mt-12">
        <table class="w-full text-sm text-left ">
            <thead class="text-xs text-gray-500 uppercase bg-gray-100 ">
                <tr>
                    <th scope="col" class="py-3 px-6 w-[600px]">
                        Place Name
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Favorites
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Reviews
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data['placesdata'] as $place)
                    <tr class="hover:bg-gray-50">
                        <th scope="row" class="py-4 px-6 font-medium text-gray-900 capitalize">
                            {{ $place['name'] }}
                        </th>
                        <td class="py-4 px-6 text-center">
                            {{ $place['favorite']->count() }}
                        </td>
                        <td class="py-4 px-6 text-center">
                            {{ $place['review']->count() }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="px-10 py-5 mt-10">
            {!! $data['placesdata']->links() !!}
        </div>
    </div>

</div>
