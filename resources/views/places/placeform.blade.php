@extends('layouts.app')

@section('structure')
    <div class="md:container mx-auto p-4 w-full  h-full flex justify-between">
        <div class="relative w-full h-full ">
            <div class="relative bg-gray-100 rounded-lg shadow ">
                <div class="py-6 px-6 ">
                    <div class="flex justify-between ">
                        <h3 class="mb-4 text-xl font-medium">Creating new places</h3>
                        <a href="{{ route('admin.show', 'places') }}"
                            class="bg-green-500 h-10 flex items-center rounded-full p-4 text-white"> Go back <i
                                class="bx bx-arrow-back pl-2 mt-1"></i></a>
                    </div>
                    <form class="space-y-6"
                        action="{{ isset($place) ? route('places.update', $place['id']) : route('places.store') }}"
                        method="POST">
                        @csrf

                        @isset($place)
                            @method('PATCH')
                        @endisset
                        <div class="flex justify-between">
                            <div class="w-full mr-5">
                                <label class="block text-grey-darker text-sm mb-2">
                                    Name</label>
                                <input
                                    onchange="{
                                    document.getElementById('name').innerHTML = this.value;    
                                }"
                                    class=" border rounded w-full py-2 px-3 text-base outline-none focus:border-green-400"
                                    type="text" placeholder="Name" name="name"
                                    value="{{ isset($place) ? $place['name'] : old('name') }}">
                                @error('name')
                                    <h1 class="text-red-400">{{ $message }}</h1>
                                @enderror
                            </div>
                            <div class="w-full">
                                <label class="block text-grey-darker text-sm mb-2">
                                    city name</label>
                                <input
                                    onchange="{
                                    document.getElementById('cityname').innerHTML = this.value;    
                                }"
                                    class=" border rounded w-full py-2 px-3 text-base outline-none focus:border-green-400"
                                    type="text" placeholder="City Name" name="cityname"
                                    value="{{ isset($place) ? $place['cityname'] : old('cityname') }}">
                                @error('cityname')
                                    <h1 class="text-red-400">{{ $message }}</h1>
                                @enderror
                            </div>
                        </div>
                        <div>
                            <select name="type"
                                onchange="{
                                document.getElementById('type').innerHTML = this.value;    
                            }"
                                class="px-4 py-3 w-full rounded-md border focus:border-green-500 focus:outline-none text-sm">
                                <option value="" {{ old('type') == '' }}>Type</option>
                                <option value="history" {{ old('type') == 'history' ? 'selected' : '' }}
                                    {{ isset($place) ? ($place['type'] == 'history' ? 'selected' : '') : '' }}>History
                                </option>
                                <option value="museums" {{ old('type') == 'museums' ? 'selected' : '' }}>Museums</option>
                                <option value="mall" {{ old('type') == 'mall' ? 'selected' : '' }}>Mall</option>
                                <option value="shopping" {{ old('type') == 'shopping' ? 'selected' : '' }}
                                    {{ isset($place) ? ($place['type'] == 'shopping' ? 'selected' : '') : '' }}>Shopping
                                </option>
                                <option value="coffee shops" {{ old('type') == 'coffeeshops' ? 'selected' : '' }}
                                    {{ isset($place) ? ($place['type'] == 'coffeeshops' ? 'selected' : '') : '' }}>Coffee
                                    Shops</option>
                                <option value="park" {{ old('type') == 'park' ? 'selected' : '' }}
                                    {{ isset($place) ? ($place['type'] == 'park' ? 'selected' : '') : '' }}>Park</option>
                                <option value="attractions" {{ old('type') == 'attractions' ? 'selected' : '' }}
                                    {{ isset($place) ? ($place['type'] == 'attractions' ? 'selected' : '') : '' }}>
                                    Attractions</option>

                            </select>
                            @error('type')
                                <h1 class="text-red-400">{{ $message }}</h1>
                            @enderror
                        </div>

                        <div class="flex justify-between">
                            <div class="w-full">
                                <label class="block text-grey-darker text-sm mb-2">
                                    open time</label>
                                <input
                                    onchange="{
                                document.getElementById('opentime').textContent = this.value+' -';    
                            }"
                                    class=" border rounded w-full py-2 px-3 text-base outline-none focus:border-green-400"
                                    type="time" name="open_time"
                                    value="{{ isset($place) ? $place['open_time'] : old('open_time') }}">
                                @error('open_time')
                                    <h1 class="text-red-400">{{ $message }}</h1>
                                @enderror
                            </div>
                            <div class="w-full">
                                <label class="block text-grey-darker text-sm mb-2">
                                    close time</label>
                                <input
                                    onchange="{
                                document.getElementById('closetime').textContent = this.value;    
                            }"
                                    class=" border rounded w-full py-2 px-3 text-base outline-none focus:border-green-400"
                                    type="time" name="close_time"
                                    value="{{ isset($place) ? $place['close_time'] : old('close_time') }}">
                                @error('close_time')
                                    <h1 class="text-red-400">{{ $message }}</h1>
                                @enderror
                            </div>
                        </div>
                        <div>
                            <label class="block text-grey-darker text-sm mb-2">
                                main image</label>
                            <input
                                onchange="{
                                document.getElementById('image').src = this.value;    
                            }"
                                class=" border rounded w-full py-2 px-3 text-base outline-none focus:border-green-400"
                                type="text" placeholder="Main Image URL" name="mainimage"
                                value="{{ isset($place) ? $place['mainimage'] : old('mainimage') }}">
                            @error('mainimage')
                                <h1 class="text-red-400">{{ $message }}</h1>
                            @enderror
                        </div>
                        <div>
                            <label class="block text-grey-darker text-sm mb-2">
                                image1</label>
                            <input class=" border rounded w-full py-2 px-3 text-base outline-none focus:border-green-400"
                                type="text" placeholder="Image one URL" name="image1"
                                value="{{ isset($place) ? $place['image1'] : old('image1') }}">
                            @error('image1')
                                <h1 class="text-red-400">{{ $message }}</h1>
                            @enderror
                        </div>
                        <div>
                            <label class="block text-grey-darker text-sm mb-2">
                                image2</label>
                            <input class=" border rounded w-full py-2 px-3 text-base outline-none focus:border-green-400"
                                type="text" placeholder="Image two URL" name="image2"
                                value="{{ isset($place) ? $place['image2'] : old('image2') }}">
                            @error('image2')
                                <h1 class="text-red-400">{{ $message }}</h1>
                            @enderror
                        </div>
                        <div>
                            <label class="block text-grey-darker text-sm mb-2">
                                image3</label>
                            <input class=" border rounded w-full py-2 px-3 text-base outline-none focus:border-green-400"
                                type="text" placeholder="Image Three URL" name="image3"
                                value="{{ isset($place) ? $place['image3'] : old('image3') }}">
                            @error('image3')
                                <h1 class="text-red-400">{{ $message }}</h1>
                            @enderror
                        </div>
                        <div>

                            <label class="block text-grey-darker text-sm mb-2">Your
                                message</label>
                            <textarea name="details" rows="4"
                                onchange="{
                                document.getElementById('details').innerHTML = this.value;    
                            }"
                                class="block p-2.5 w-full text-sm text-gray-900 rounded-lg border border-gray-300  focus:border-green-500 focus:outline-none"
                                placeholder="Write your details here...">{{ isset($place) ? $place['details'] : old('details') }}</textarea>

                            @error('details')
                                <h1 class="text-red-400">{{ $message }}</h1>
                            @enderror
                        </div>

                        <div class="flex justify-between">


                        </div>
                        <input type="submit" value="{{ isset($place) ? 'Update' : 'Create' }}"
                            class="w-full text-white bg-green-400 hover:bg-green-500 focus:outline-none font-medium rounded-lg text-lg px-5 py-1 text-center ">
                    </form>
                </div>
            </div>
        </div>

        <div class="w-full h-screen py-6 px-6 flex flex-col justify-center items-center">
            <div
                class="shadow-lg transition duration-500 ease-in-out transform hover:-translate-y-2 hover:shadow-1xl rounded-lg h-90 w-60 md:w-80 cursor-pointer ">
                <a href="#" class="w-full block h-full">
                    <img id="image" width="320px" alt="photo"
                        src="{{ isset($place) ? $place['mainimage'] : 'https://static.toiimg.com/thumb/msid-80786117,width-748,height-499,resizemode=4,imgsize-272533/.jpg' }}"
                        class="max-h-40 w-full object-cover" />
                    <div class="bg-white w-full p-4">
                        <p id="name" class="text-green-500 text-2xl font-medium uppercase">
                            {{ isset($place) ? $place['name'] : 'place name' }}
                        </p>
                        <div class="flex mt-2 capitalize">
                            <p class="text-gray-800 text-md font-medium mb-2  ">
                                <i class="bx bx-category-alt text-green-500 "></i> <span
                                    id="type">{{ isset($place) ? $place['type'] : 'type' }}</span>
                            </p>

                            <div class="text-gray-800 text-md font-medium  pl-5 ">
                                <i class="bx bx-buildings text-green-500"> </i> <span
                                    id="cityname">{{ isset($place) ? $place['cityname'] : 'city' }}</span>
                            </div>
                            <div class="text-gray-800 text-md font-medium  pl-5 ">
                                <i class="bx bx-time text-green-500"> </i> <span
                                    id="opentime">{{ isset($place) ? $place['open_time'].' -' : '09:00'.' -' }}</span>
                                <span
                                    id="closetime">{{ isset($place) ? $place['close_time'] : '10:00' }}</span>
                            </div>
                        </div>
                        <p id="details" class="text-gray-600 text-md h-36">
                            {{ isset($place)
                                ? $place['details']
                                : ' Lorem ipsum dolor sit amet, consectetur adipisicing elit. Incidunt doloribus ipsum dolor
                                                                                                                                                                        tenetur, consectetur cum.' }}
                        </p>

                    </div>
                </a>
            </div>
        </div>
    </div>
@endsection
