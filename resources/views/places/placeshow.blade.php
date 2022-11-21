@extends('layouts.app')


@section('structure')
    <div class="h-screen w-screen">
        <div class="w-full flex justify-center items-start mx-auto px-5 md:px-14 mt-10">

            <div class="relative w-full h-[350px] md:h-[430px] md:w-[900px]">

                <div class="slide relative">
                    <img class="w-full h-[350px] md:h-[430px] " src="{{ $place['mainimage'] }}">
                </div>
                <div class="slide relative">
                    <img class="w-full h-[350px] md:h-[430px] " src="{{ $place['image1'] }}">
                </div>
                <div class="slide relative">
                    <img class="w-full h-[350px] md:h-[430px] " src="{{ $place['image2'] }}">
                </div>
                <div class="slide relative">
                    <img class="w-full h-[350px] md:h-[430px] " src="{{ $place['image3'] }}">
                </div>

                <!-- The previous button -->
                <a class="absolute left-0 top-1/2 p-4 -translate-y-1/2 font-extrabold rounded-tr-full rounded-br-full text-4xl bg-opacity-40 bg-black text-gray-300 hover:text-green-500 cursor-pointer"
                    onclick="moveSlide(-1)">❮</a>

                <!-- The next button -->
                <a class="absolute right-0 top-1/2 p-4 -translate-y-1/2 rounded-tl-full rounded-bl-full font-extrabold text-4xl bg-opacity-40 bg-black text-gray-300 hover:text-green-500 cursor-pointer"
                    onclick="moveSlide(1)">❯</a>

            </div>
            <br>

            <!-- The dots -->
            <div class="absolute top-80 md:top-96 pt-24 md:pt-32 flex justify-center items-center space-x-5">
                <div class="dot w-4 h-4 rounded-full cursor-pointer" onclick="currentSlide(1)"></div>
                <div class="dot w-4 h-4 rounded-full cursor-pointer" onclick="currentSlide(2)"></div>
                <div class="dot w-4 h-4 rounded-full cursor-pointer" onclick="currentSlide(3)"></div>
                <div class="dot w-4 h-4 rounded-full cursor-pointer" onclick="currentSlide(4)"></div>
            </div>


        </div>
        <div class="px-5 md:px-10 w-full flex justify-center">
            <div class="w-full pb-5 md:w-[900px] md:px-8 bg-white shadow-lg rounded-lg ">
                <div>
                    <div class="flex items-center">
                        <div class="flex items-center">
                            <h2 class=" text-4xl font-semibold mt-5 text-green-500 capitalize">{{ $place['name'] }}</h2>
                            @if (Auth::check())
                                @if (in_array($place['id'], $favoritelists))
                                    <form class="mr-10 mt-7 ml-2" action='{{ route('favorites.destroy', $place['id']) }}'
                                        method="POST">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit">
                                            <div
                                                class=" z-50 text-red-500 text-2xl hover:text-gray-700 bg-opacity-50 w-10 h-10 rounded-full flex justify-center items-center">
                                                <i class="bx bxs-heart " type="solid"></i>
                                            </div>
                                        </button>

                                    </form>
                                @else
                                    <form class="mr-10 mt-7 ml-2" action='{{ route('favorites.store') }}' method="POST">
                                        @csrf
                                        <input type="number" name="place_id" hidden value="{{ $place['id'] }}">
                                        <input type="number" name="user_id" hidden value="{{ Auth::user()->id }}">
                                        <button type="submit">
                                            <div
                                                class=" z-50 text-2xl text-gray-500 hover:text-red-500 w-10 h-10 flex justify-center items-center">
                                                <i class="bx bxs-heart " type="solid"></i>
                                            </div>
                                        </button>
                                    </form>
                                @endif
                            @else
                                <a data-modal-toggle='popup-modal'>
                                    <div
                                        class="mr-10 mt-7 ml-2 z-50 text-gray-700 hover:text-red-500 text-2xl w-10 h-10 rounded-full flex justify-center items-center">
                                        <i class="bx bxs-heart " type="solid"></i>
                                    </div>
                                </a>
                            @endif
                        </div>
                        <div class="flex items-center mt-2">
                            <h2 class=" text-xl font-semibold mt-5 capitalize"> <i
                                    class="bx bx-category-alt text-green-500 "></i>
                                <span>{{ $place['type'] }}</span>
                            </h2>
                            <h2 class="ml-4 text-xl font-semibold mt-5 capitalize"> <i
                                    class="bx bx-buildings text-green-500"> </i>
                                <span>{{ $place['cityname'] }}</span>
                            </h2>
                        </div>

                    </div>
                    <div class="flex flex-col md:flex-row">
                        <div>
                            <div>
                                <h2 class=" text-lg mt-5"> <i class="bx bx-time text-green-500"></i>
                                    Open Time: <span>{{ $place['open_time'] . ' - ' . $place['close_time'] }}</span>
                                </h2>
                            </div>
                            <p class="text-gray-600 text-lg md:text-md w-96 mt-4 h-36 ">
                                <span class="font-bold">Details: </span>{{ $place['details'] }}
                            </p>
                        </div>
                        <div class="md:ml-14 mt-4 w-[400px] h-[300px] bg-gray-100 p-2">

                            <iframe width="100%" height="100%" frameborder="0" marginheight="0" marginwidth="0"
                                title="map" scrolling="no"
                                src="https://maps.google.com/maps?width=100%&height=600&hl=en&q={{ $place['name'] }}&ie=UTF8&t=&z=14&iwloc=B&output=embed"></iframe>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>






    <script>
        let slideIndex = 1;
        showSlide(slideIndex);

        // change slide with the prev/next button
        function moveSlide(moveStep) {
            showSlide(slideIndex += moveStep);
        }

        // change slide with the dots
        function currentSlide(n) {
            showSlide(slideIndex = n);
        }

        function showSlide(n) {
            let i;
            const slides = document.getElementsByClassName("slide");
            const dots = document.getElementsByClassName('dot');

            if (n > slides.length) {
                slideIndex = 1
            }
            if (n < 1) {
                slideIndex = slides.length
            }

            // hide all slides
            for (i = 0; i < slides.length; i++) {
                slides[i].classList.add('hidden');
            }

            // remove active status from all dots
            for (i = 0; i < dots.length; i++) {
                dots[i].classList.remove('bg-green-500');
                dots[i].classList.add('bg-gray-100');
            }

            // show the active slide
            slides[slideIndex - 1].classList.remove('hidden');

            // highlight the active dot
            dots[slideIndex - 1].classList.remove('bg-gray-100');
            dots[slideIndex - 1].classList.add('bg-green-400');
        }
    </script>
@endsection
