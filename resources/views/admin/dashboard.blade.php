<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Admin</title>
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

<body class="h-screen w-screen 2xl:container mx-auto">
    
    <div class="flex h-full w-full ">
        <div class="w-1/5 ">
            @include('admin.sidebar')
        </div>
        <div class="w-full overflow-hidden overflow-y-scroll">
            @switch($pages)
                @case('users')
                    @include('admin.pages.userspage')
                @break

                @case('places')
                    @include('admin.pages.placespage')
                @break

                @default
                    @include('admin.pages.dashboardpage')
            @endswitch
        </div>
    </div>
</body>
<script src="https://unpkg.com/flowbite@1.5.1/dist/flowbite.js"></script>

</html>
