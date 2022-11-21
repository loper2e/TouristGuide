@include('layouts.messagetoast')

@include('layouts.filtter', ['page' => 'admin'])

<div class="p-10 w-full ">
    @foreach ($places as $place)
        <div class="w-full h-44 flex mb-5 duration-200 transition-transform ease-in-out hover:scale-105">
            <img width="340px" src="{{ $place['mainimage'] }}" alt="">
            <div class="w-full border border-green-400 bg-white p-4 flex flex-col justify-between leading-normal">
                <div class="mb-4">
                    <div class="flex justify-between">
                        <h1 class="text-gray-900 font-bold text-lg mb-2 uppercase ">
                            {{ $place['name'] . '  ( ID: ' . $place['id'] . ')' }}</h1>
                        <p class=" leading-none capitalize "><i class="bx bx-user-circle text-green-500"></i>
                            <span>{{ $place['user_name'] }}</span>
                        </p>
                    </div>
                    <p class="text-gray-700 text-sm h-10">{{ $place['details'] }}</p>
                </div>
                <div class="flex justify-between">
                    <div>
                        <div class="flex mt-2">
                            <p class=" leading-none capitalize "><i class="bx bx-buildings text-green-500"></i>
                                <span>{{ $place['cityname'] }}</span>
                            </p>
                            <p class=" leading-none capitalize pl-4"><i class="bx bx-category-alt text-green-500 "></i>
                                <span class="">{{ $place['type'] }}</span>
                            </p>
                            <p class=" pl-4"> <i class="bx bx-time text-green-500"></i>
                                <span>{{ $place['open_time'] . ' - ' . $place['close_time'] }}</span>
                            </p>
                        </div>
                        <p class="text-gray-500 capitalize pt-1"><i class="bx bx-calendar text-green-500"></i>
                            {{ $place['created_at'] }}</p>
                    </div>
                    <div class="flex">
                        <button type="button" data-modal-toggle="popup-modal"
                            onclick="{
                            document.getElementById('delete').action = '/places/{{ $place['id'] }}';
                        }"
                            class="mt-5 mr-4 h-10 px-4 rounded-full flex items-center text-lg text-white bg-red-400 hover:bg-red-500"><i
                                class="bx bx-trash"></i></button>
                        <a href="{{ route('places.edit', $place['id']) }}"
                            class="mt-5 h-10 px-4 rounded-full flex items-center text-lg text-white bg-green-400 hover:bg-green-500"><i
                                class="bx bx-edit"></i></a>
                    </div>
                </div>
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
                <h3 class="mb-5 text-lg font-normal text-gray-700">Are you sure you want to
                    delete
                    this product?</h3>
                <div class="flex justify-center">
                    <form id="delete" action="" method="POST">
                        @csrf
                        @method('DELETE')

                        <input type="submit" value="Yes, i'm sure"
                            class="mt-5 h-10 px-4 mr-5 flex items-center text-lg text-white bg-red-400 hover:bg-red-500">
                    </form>
                    <button data-modal-toggle="popup-modal" type="button"
                        class="mt-5 h-10 px-4 flex items-center text-lg text-white bg-gray-400 hover:bg-gray-500 ">No,
                        cancel</button>
                </div>
            </div>
        </div>
    </div>
</div>
