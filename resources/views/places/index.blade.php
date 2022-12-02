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
                                        class="absolute bg-white z-50 top-8 right-3 text-red-500  text-2xl w-8 h-8 rounded-full flex justify-center items-center">
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
                                        class="absolute bg-white z-50 top-8 right-3 text-gray-700 hover:text-red-500 text-2xl  w-8 h-8 rounded-full flex justify-center items-center">
                                        <i class="bx bxs-heart " type="solid"></i>
                                    </div>
                                </button>
                            </form>
                        @endif
                    @else
                        <a data-modal-toggle='popup-modal'>
                            <div
                                class="absolute bg-white z-50 cursor-pointer top-3 right-3 text-gray-700 hover:text-red-500 text-2xl  w-8 h-8 rounded-full flex justify-center items-center">
                                <i class="bx bxs-heart " type="solid"></i>
                            </div>
                        </a>
                    @endif
                    <a href="{{ route('places.show', $place['id']) }}">
                        <img alt="photo" src="{{ $place['mainimage'] }}" class="max-h-40 w-full object-cover" />
                        <div class="bg-white w-full p-4">
                            <p class="text-green-500 text-xl md:text-2xl font-medium uppercase">
                                {{ $place['name'] }}
                            </p>
                            <div class="flex mt-2 capitalize">
                                <p class="text-gray-800 text-sm md:text-md font-medium mb-2  ">
                                    <i class="bx bx-category-alt text-green-500 "></i> <span>{{ $place['type'] }}</span>
                                </p>

                                <div class="text-gray-800 text-sm md:text-md font-medium  pl-10 ">
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
@endsection
