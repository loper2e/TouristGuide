@extends('layouts.app')

@section('structure')
    @include('layouts.messagetoast')

    <div class="md:container pt-40 mx-auto flex items-center justify-around">


        <div class="flex flex-col w-full px-6 justify-center lg:items-start overflow-y-hidden">
            <h1 class="my-4 text-4xl xl:text-6xl text-green-500 font-bold leading-tight text-center lg:text-start ">Discover
                the wonderful place with us</h1>
            <div class="w-full text-center lg:text-start lg:w-96">
                <p class="leading-normal text-lg xl:text-2xl mb-8 capitalize">
                    just give us your location, we will wrap it up for you.</p>
            </div>

            <p class=" fade-in capitalize pb-2">City Name</p>
            <div class="flex justify-center w-full">
                <form class="input-group relative flex w-full " action="{{ route('places.index') }}" method="GET">
                    <input type="text" name="city"
                        class="form-control  block w-full px-3 py-3.5 text-base font-normal  bg-white bg-clip-padding border border-solid border-gray-300 transition ease-in-out m-0 focus:bg-white focus:border-green-500 focus:outline-none"
                        placeholder="Search">
                    <input type="text" name="sort" value="asc" hidden>

                    <button
                        class="btn px-6  bg-green-500 text-white font-medium text-xs leading-tight uppercase  shadow-md hover:bg-green-600 hover:shadow-lg focus:bg-green-700  focus:shadow-lg focus:outline-none focus:ring-0 active:bg-green-500 active:shadow-lg transition duration-150 ease-in-out flex items-center"
                        type="submit" id="button-addon2">
                        <i class="bx bx-search-alt-2 text-2xl"></i>
                    </button>
                </form>
            </div>
        </div>

        <div class="w-full py-6 overflow-y-hidden hidden lg:block">
            <img class="w-5/6 mx-auto lg:mr-0 slide-in-bottom" src="storage/9831.jpg">
        </div>

    </div>

    <div class="md:container w-full pt-10 mx-auto mt-24">

        <div class="flex justify-center items-center ">
            <div class="rounded-full mx-3 bg-green-400 lg:w-4 lg:h-4 w-2 h-2"></div>
            <h1 class="lg:text-3xl text-lg font-bold">Popular Cities</h1>
        </div>

        <div class="grid lg:grid-cols-4 grid-cols-3 lg:px-0 px-3 gap-2 mt-10">

            <a href="/places?type=erbil&city=erbil&sort=asc">
                <div class="relative border  h-full border-gray-200 shadow-md group overflow-hidden">
                    <img class="group-hover:scale-110 transition-transform duration-700  h-full"
                        src="http://t3.gstatic.com/licensed-image?q=tbn:ANd9GcS_HDHcPkdip81MOydN_jdeHbzN-jFf-DQmxYfYKcQdqshotzVylasYmKsOF9vPGV99"
                        alt="" />
                    <div class="absolute bottom-0 bg-black w-full h-full opacity-25"></div>
                    <div class=" absolute bottom-0 text-center w-full ">
                        <h5 class="mb-2 w-full text-3xl font-semibold text-white capitalize">Erbil
                        </h5>
                    </div>
                </div>
            </a>

            <a href="/places?type=&city=duhok&sort=asc">
                <div class="relative border h-full  border-gray-200 shadow-md group overflow-hidden">
                    <img class="group-hover:scale-110 transition-transform duration-700  h-full"
                        src="https://images.ntviraq.com/nrten/14112021812282021123498202112581613901561923.jpg"
                        alt="" />
                    <div class="absolute bottom-0 bg-black w-full h-full opacity-25"></div>
                    <div class=" absolute bottom-0 text-center w-full ">
                        <h5 class="mb-2 w-full text-3xl font-semibold text-white capitalize">duhok
                        </h5>
                    </div>
                </div>
            </a>

            <a href="/places?type=&city=sulaymaniyah&sort=asc">
                <div class="relative border h-full  border-gray-200 shadow-md group overflow-hidden">
                    <img class="group-hover:scale-110 transition-transform duration-700  h-full"
                        src="https://www.basnews.com/media/k2/items/cache/3a60f5e29203d9f6d19ae5c73ce4d5b4_L.jpg?-62169984000"
                        alt="" />
                    <div class="absolute bottom-0 bg-black w-full h-full opacity-25"></div>
                    <div class=" absolute bottom-0 text-center w-full ">
                        <h5 class="mb-2 w-full text-3xl font-semibold text-white capitalize">sulaymaniyah
                        </h5>
                    </div>
                </div>
            </a>

            <a href="/places?type=&city=halabja&sort=asc">
                <div class="relative border h-full  border-gray-200 shadow-md group overflow-hidden">
                    <img class="group-hover:scale-110 transition-transform duration-700  h-full"
                        src="https://media.shafaq.com/media/arcella/1647428105314.jpg" alt="" />
                    <div class="absolute bottom-0 bg-black w-full h-full opacity-25"></div>
                    <div class=" absolute bottom-0 text-center w-full ">
                        <h5 class="mb-2 w-full text-3xl font-semibold text-white capitalize">Halabja
                        </h5>
                    </div>
                </div>
            </a>

            <a href="/places?type=kirkuk&city=kirkuk&sort=asc">
                <div class="relative border h-full  border-gray-200 shadow-md group overflow-hidden">
                    <img class="group-hover:scale-110 transition-transform duration-700  h-full"
                        src="https://media.istockphoto.com/id/854859748/photo/a-view-of-the-citadel-in-the-city-of-kirkuk.jpg?s=612x612&w=0&k=20&c=d5M8jKO-N0dTVHd2N_0tdyOZhwFu5mN_-Txz9iEx_K4="
                        alt="" />
                    <div class="absolute bottom-0 bg-black w-full h-full opacity-25"></div>
                    <div class=" absolute bottom-0 text-center w-full ">
                        <h5 class="mb-2 w-full text-3xl font-semibold text-white capitalize">Kirkuk
                        </h5>
                    </div>
                </div>
            </a>


        </div>

    </div>
@endsection
