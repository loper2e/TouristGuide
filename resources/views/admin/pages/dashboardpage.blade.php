<div class="mt-8 w-full p-20">
    <h2 class="text-lg font-medium truncate">Dashboard</h2>
    <div class="flex justify-around mt-5 w-full">
        <a class="w-2/6 m-1 transform  hover:scale-105 transition duration-300 shadow-xl rounded-lg bg-white" href="#">
            <div class="p-5 ">
                <div class="flex justify-between">
                    <i class="bx bx-group text-2xl"></i>
                    <div
                        class="bg-green-500 rounded-full h-6 px-2 flex justify-items-center text-white font-semibold text-sm">
                        <span class="flex items-center">30%</span>
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
        <a class="w-2/6 m-1 transform  hover:scale-105 transition duration-300 shadow-xl rounded-lg bg-white" href="#">
            <div class="p-5 ">
                <div class="flex justify-between">
                    <i class="bx bx-compass text-2xl"></i>
                    <div
                        class="bg-green-500 rounded-full h-6 px-2 flex justify-items-center text-white font-semibold text-sm">
                        <span class="flex items-center">30%</span>
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
        <a class="w-2/6 m-1 transform  hover:scale-105 transition duration-300 shadow-xl rounded-lg bg-white" href="#">
            <div class="p-5">
                <div class="flex justify-between">
                    <i class="bx bx-list-ul text-2xl"></i>
                    <div
                        class="bg-green-500 rounded-full h-6 px-2 flex justify-items-center text-white font-semibold text-sm">
                        <span class="flex items-center">30%</span>
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
        <a class="w-2/6 m-1 transform  hover:scale-105 transition duration-300 shadow-xl rounded-lg bg-white" href="#">
            <div class="p-5">
                <div class="flex justify-between">
                    <i class="bx bx-star text-2xl"></i>
                    <div
                        class="bg-green-500 rounded-full h-6 px-2 flex justify-items-center text-white font-semibold text-sm">
                        <span class="flex items-center">30%</span>
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

    
</div>
