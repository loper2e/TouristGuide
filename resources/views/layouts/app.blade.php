<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/flowbite@1.5.1/dist/flowbite.js"></script>
    <title> </title>
</head>

<style>
    body {
        overflow-x: hidden;
    }

    body::-webkit-scrollbar {
        width: 12px;
    }

    body::-webkit-scrollbar-track {
        box-shadow: inset 0 0 6px rgba(99, 99, 99, 0.993);
    }

    body::-webkit-scrollbar-thumb {
        background-color: rgb(31, 11, 53);
        outline: none;
        border-radius: 50px;
    }
</style>

<body>

    <div id="popup-modal" tabindex="-1" class="hidden w-full h-full absolute top-10 z-50 p-4 ">
        <div class=" max-w-md ">
            <div class="relative bg-gray-100 rounded-lg shadow w-[400px] h-[250px]">
                <button type="button"
                    class="absolute top-3 right-2 bg-transparent  rounded-lg ml-auto inline-flex items-center"
                    data-modal-toggle="popup-modal">
                    <i class="bx bx-x text-3xl text-green-400 hover:text-green-600"></i>
                </button>
                <div class="p-6 text-center">
                    <i class="bx bx-info-circle text-6xl"></i>
                    <h3 class="mb-5 text-lg font-normal text-gray-700">You need to Login
                    </h3>
                    <div class="flex justify-center">

                        <a href="{{ route('user.index') }}"
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

    @if (!Request::is('user/*') &&
        !Request::is('user') &&
        !Request::is('places/create') &&
        !Request::is('places/*/edit'))
        @include('layouts.header')

        @yield('structure')

        @include('layouts.footer')
    @else
        @yield('structure')
    @endif




</body>

</html>
