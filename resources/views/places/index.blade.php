@extends('layouts.app')


@section('structure')
    @if (Request::is('favorites'))
        @include('layouts.filtter', ['page' => 'favorites'])
        <h1 class="text-center text-3xl uppercase"><span class="border-b-2 border-green-500 pb-2 px-5">Favorites</span></h1>
    @else
        @include('layouts.filtter', ['page' => 'user'])
    @endif


    <div class="md:container mx-auto h-full w-full min-h-screen flex flex-wrap gap-5 px-5 md:px-0">

        @if (!isset($places[0]))
            <div class="w-full text-center pt-14">
                <div>
                    <i class="bx bxs-binoculars text-6xl"></i>
                    <h1 class="text-4xl text-green-400 font-bold">No Results Found</h1>
                    <p>we couldn't find what you looking for. </p>
                </div>
            </div>
        @endif

        @foreach ($places as $place)
            <div class=" h-full w-52 md:w-72 py-6 flex flex-col justify-center items-center">
                <div
                    class="relative shadow-lg transition duration-500 ease-in-out transform hover:-translate-y-2 hover:shadow-1xl rounded-lg h-full w-full cursor-pointer ">
                    @if (Auth::check())
                        @if (in_array($place['id'], $favoritelists))
                            <form action='{{ route('favorites.destroy', $place['id']) }}' method="POST">
                                @csrf
                                @method('DELETE')

                                <button type="submit">
                                    <div
                                        class="absolute z-50 top-8 right-3 text-red-500 hover:text-gray-700 text-2xl w-10 h-10 rounded-full flex justify-center items-center">
                                        <i class="bx bxs-heart " type="solid"></i>
                                    </div>
                                </button>

                            </form>
                        @else
                            <form action='{{ route('favorites.store') }}' method="POST">
                                @csrf
                                <input type="number" name="place_id" hidden value="{{ $place['id'] }}">
                                <input type="number" name="user_id" hidden value="{{ Auth::user()->id }}">
                                <button type="submit">
                                    <div
                                        class="absolute z-50 top-8 right-3 text-gray-700 hover:text-red-500 text-2xl  w-10 h-10 rounded-full flex justify-center items-center">
                                        <i class="bx bxs-heart " type="solid"></i>
                                    </div>
                                </button>
                            </form>
                        @endif
                    @else
                        <a data-modal-toggle='popup-modal'>
                            <div
                                class="absolute z-50 top-3 right-3 text-gray-700 hover:text-red-500 text-2xl  w-10 h-10 rounded-full flex justify-center items-center">
                                <i class="bx bxs-heart " type="solid"></i>
                            </div>
                        </a>
                    @endif
                    <a href="{{ route('places.show', $place['id']) }}">
                        <img alt="photo" src="{{ $place['mainimage'] }}" class="max-h-40 w-full object-cover" />
                        <div class="bg-white w-full p-4">
                            <p class="text-green-500 text-2xl font-medium uppercase">
                                {{ $place['name'] }}
                            </p>
                            <div class="flex mt-2 capitalize">
                                <p class="text-gray-800 text-md font-medium mb-2  ">
                                    <i class="bx bx-category-alt text-green-500 "></i> <span>{{ $place['type'] }}</span>
                                </p>

                                <div class="text-gray-800 text-md font-medium  pl-10 ">
                                    <i class="bx bx-buildings text-green-500"> </i> <span>{{ $place['cityname'] }}</span>
                                </div>
                            </div>
                            <p class="text-gray-600 text-sm md:text-md h-36 overflow-hidden">
                                {{ $place['details'] }}
                            </p>

                        </div>
                    </a>
                </div>
            </div>
        @endforeach
    </div>


    <div id="popup-modal" tabindex="-1" class="hidden w-full h-full absolute top-10 z-50 p-4 ">
        <div class=" max-w-md ">
            <div class="relative bg-gray-100 rounded-lg shadow ">
                <button type="button"
                    class="absolute top-3 right-2 bg-transparent hover:bg-green-500  rounded-lg ml-auto inline-flex items-center"
                    data-modal-toggle="popup-modal">
                    <i class="bx bx-x text-3xl text-green-400 hover:text-white"></i>
                </button>
                <div class="p-6 text-center">
                    <i class="bx bx-info-circle text-6xl"></i>
                    <h3 class="mb-5 text-lg font-normal text-gray-700">You need to Login
                    </h3>
                    <div class="flex justify-center">

                        <a href="{{ route('user.index') }}" data-modal-toggle="popup-modal" type="button"
                            class="mt-5 mr-5 h-10 px-4 flex items-center text-lg text-white bg-green-400 hover:bg-green-500 ">Yes,
                            login</a>
                        <button data-modal-toggle="popup-modal" type="button"
                            class="mt-5 h-10 px-4 flex items-center text-lg text-white bg-gray-400 hover:bg-gray-500 ">No,
                            cancel</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
