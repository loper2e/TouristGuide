@extends('layouts.app')


@section('structure')


    <div class="h-full w-screen">

        <div class="w-screen h-32 absolute">
            <div class="ml-64 -mt-4">
                @include('layouts.messagetoast')
            </div>
        </div>

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
                                @if ($favoritelists == true)
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



        <div class="flex flex-col items-center w-full mt-20">


            <h1 class="text-3xl"><span class="border-b-2 border-green-500 px-4">Reviews</span></h1>

            <form class="px-5 w-full h-full pb-5 md:w-[900px] mt-10 rounded-lg bg-gray-50 p-5"
                action="{{ route('reviews.store') }}" method="POST">
                @csrf
                <div class="w-full mb-4 border border-gray-200 rounded-lg bg-gray-50 ">
                    <div class="px-4 py-2 bg-white rounded-t-lg ">
                        <textarea name="content" rows="4" class="w-full outline-none px-0 text-sm text-gray-900 bg-white "
                            placeholder="Write a Review..." required></textarea>
                    </div>
                    <input type="number" name="place_id" value="{{ $place['id'] }}" hidden>
                    <input type="number" name="user_id" value="{{ isset(Auth::user()->id) ? Auth::user()->id : '' }}"
                        hidden>
                    <div class="flex items-center justify-between px-3 py-2 border-t border-gray-600">

                        <div class=" z-50 text-2xl text-gray-400">
                            @for ($i = 1; $i <= 5; $i++)
                                @if ($i == 1)
                                    <i class="bx bxs-star pr-1 text-yellow-500"
                                        onclick="{starRate({{ $i - 1 }})}"><input checked id="star"
                                            type="radio" hidden name="rate" value="{{ $i }}" /></i>
                                @else
                                    <i class="bx bxs-star pr-1 " onclick="{starRate({{ $i - 1 }})}"><input
                                            id="star" type="radio" hidden name="rate"
                                            value="{{ $i }}" /></i>
                                @endif
                            @endfor
                        </div>

                        @if (auth::check())
                            <button type="submit"
                                class=" py-2 px-4 text-md font-bold text-center text-white bg-green-400 hover:bg-green-500 rounded-full">
                                Post Review
                            </button>
                        @else
                            <h1 class="capitalize">You need to login, to review</h1>
                            <a href="{{ route('user.index') }}"
                                class=" py-2 px-4 text-md font-bold text-center text-white bg-green-400 hover:bg-green-500 rounded-full">
                                Login
                            </a>
                        @endif
                    </div>
                </div>
            </form>



            @if ($userReview != null)
                <div class="relative">
                    <form class="px-5 w-full h-full pb-5 md:w-[900px] mt-10 rounded-lg bg-green-100 p-5" method="POST"
                        action="{{ route('reviews.update', $userReview['id']) }}">
                        @csrf
                        @method('PATCH')
                        <h1 class="text-center font-bold text-xl capitalize">Your review</h1>
                        <div class="flex items-center mb-4 space-x-4">
                            <img class="w-10 h-10 rounded-full" src="{{ $userReview['userimage'] }}" alt="">
                            <div>
                                <p class="text-xl capitalize p-0">{{ $userReview['username'] }}</p>
                                <p class="text-gray-400 text-sm">{{ $userReview['created_at'] }}</p>
                            </div>
                        </div>
                        <div class="flex items-center mb-1 text-gray-400">
                            @for ($i = 1; $i <= 5; $i++)
                                <i class="bx bxs-star pr-1 {{ $userReview['rate'] >= $i ? 'text-yellow-500' : '' }}"
                                    onclick="{estarRate({{ $i - 1 }})}"><input id="estar" type="radio" {{ $userReview['rate'] == $i ? 'checked' : '' }}
                                        hidden name="rate" value="{{ $i }}" /></i>
                            @endfor
                            <button type="button" onclick="{ estarRate({!! $userReview['rate'] - 1 !!})}"
                                class="px-2 text-sm text-center text-gray-700 rounded-full">
                                Reset
                            </button>
                        </div>
                        <div class="mb-5 text-sm text-gray-700 ">
                            <p>From <span class="uppercase">{{ $userReview['country'] }}</span>

                            </p>
                        </div>
                        <div class="px-4 pt-5 pb-5 bg-white rounded-t-lg h-full">
                            <textarea name="content" required class="w-full h-64 outline-none px-0 text-sm text-gray-900 bg-white "
                                placeholder="Write a Review...">{{ $userReview['content'] }}</textarea>
                        </div>

                        <button type="submit"
                            class=" mt-4 py-2 px-4 text-md font-bold text-center text-white bg-green-400 hover:bg-green-500 rounded-full">
                            Update Review
                        </button>


                    </form>
                    <form class="absolute bottom-5 left-44" action="{{ route('reviews.destroy', $userReview['id']) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class=" mt-4 py-2 px-4 text-md font-bold text-center text-white bg-red-400 hover:bg-red-500 rounded-full">
                            Delete
                        </button>
                    </form>
                </div>
            @endif

            @if (!isset($reviews[0]))
                <div class="w-full pb-96 mb-96 text-center pt-14">
                    <div>
                        <i class="bx bxs-award text-6xl"></i>
                        <h1 class="text-4xl text-green-400 font-bold">No Reviews Found</h1>
                        <p>There is no reviews for that place</p>
                    </div>
                </div>
            @endif

            @foreach ($reviews as $review)
                @if (Auth::check() ? auth::user()->id != $review['user_id'] : true)
                    <div class="px-5 w-full h-full md:w-[900px] mt-5 rounded-lg bg-gray-100 p-5">
                        <div class="flex items-center mb-4 space-x-4">
                            <img class="w-10 h-10 rounded-full" src="/docs/images/people/profile-picture-5.jpg"
                                alt="">
                            <div>
                                <p class="text-xl capitalize p-0">{{ $review['username'] }}</p>
                                <p class="text-gray-400 text-sm">{{ $review['created_at'] }}</p>
                            </div>
                        </div>
                        <div class="flex items-center mb-1">
                            @for ($i = 1; $i <= $review['rate']; $i++)
                                <i class="bx bxs-star pr-1 text-yellow-500"></i>
                            @endfor
                            @for ($i = 1; $i <= 5 - $review['rate']; $i++)
                                <i class="bx bxs-star pr-1 text-gray-500"></i>
                            @endfor
                        </div>
                        <div class="mb-3 text-sm text-gray-700 ">
                            <p>Reviewed in the <span class="uppercase">{{ $review['country'] }}</span>
                            </p>
                        </div>
                        <p id="textlong" class="h-24 bg-white p-2 pt-1  overflow-hidden font-light ">
                            {{ $review['content'] }} </p>
                        <button id="toglle"
                            onclick="{
                       const button = document.getElementById('toglle');
                       const text = document.getElementById('textlong');
                    if (text.classList.contains('h-full')) {
                        text.classList.remove('h-full') 
                        text.classList.add('h-24') 
                        return button.textContent = 'Read more...';
                    }
                    text.classList.remove('h-24') 
                    text.classList.add('h-full') 
                    button.textContent = 'Read less';  
                   
                    }"
                            class="block w-full p-2 pt-1 bg-white mb-5 text-left text-sm font-medium text-blue-500 hover:text-blue-600 {{ strlen($review['content']) >= 500 ? 'block' : 'hidden' }}">Read
                            more...</button>
                    </div>
                @endif
            @endforeach


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


            function starRate(id) {
                const star = document.querySelectorAll('#star');
                star[id].checked = true;
                star[id].parentElement.style.color = '#eab308';
                for (let i = id; i >= 0; i--) {
                    star[i].parentElement.style.color = '#eab308';
                }
                for (let i = 1 + id; i <= 4; i++) {
                    star[i].parentElement.style.color = '#9ca3af';
                }

            }

            function estarRate(id) {
                const star = document.querySelectorAll('#estar');
                star[id].checked = true;
                star[id].parentElement.style.color = '#eab308';
                for (let i = id; i >= 0; i--) {
                    star[i].parentElement.style.color = '#eab308';
                }
                for (let i = 1 + id; i <= 4; i++) {
                    star[i].parentElement.style.color = '#9ca3af';
                }

            }
        </script>
    @endsection
