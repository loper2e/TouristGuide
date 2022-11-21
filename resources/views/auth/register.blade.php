@extends('layouts.app')

@section('structure')
    <div class="container mx-auto pt-40">
        <div class="w-5/6 lg:w-1/2 mx-auto bg-white rounded shadow">
            <a class="text-3xl font-bold font-heading text-center p-5" href="/">
                <h1 class="uppercase text-2xl "><span class="bg-green-500 p-2 text-white">tourist</span> guide</h1>
            </a>
            <form class="py-6 px-12" action="{{ route('user.store') }}" method="POST">
                @csrf
                <div class="flex mb-4">
                    <div class="w-1/2 mr-1">
                        <label class="block text-grey-darker text-sm mb-2">First
                            Name</label>
                        <input class=" border rounded w-full py-2 px-3 text-base outline-none focus:border-green-400"
                            type="text" placeholder="first name" name="firstname" value="{{ old('firstname') }}"> 
                        @error('firstname')
                            <h1 class="text-red-400">{{ $message }}</h1>
                        @enderror
                    </div>
                    <div class="w-1/2 ml-1">
                        <label class="block text-grey-darker text-sm  mb-2">Last
                            Name</label>
                        <input class=" border rounded w-full py-2 px-3 text-base outline-none focus:border-green-400"
                            type="text" placeholder="last name" name="lastname" value="{{ old('lastname') }}">
                        @error('lastname')
                            <h1 class="text-red-400">{{ $message }}</h1>
                        @enderror
                    </div>
                </div>
                <div class="mb-4">
                    <label class="block text-grey-darker text-sm mb-2">Username
                    </label>
                    <input class=" border rounded w-full py-2 px-3 text-base outline-none focus:border-green-400"
                        type="text" placeholder="Username" name="username" value="{{ old('username') }}">
                    @error('username')
                        <h1 class="text-red-400">{{ $message }}</h1>
                    @enderror
                </div>
                <div class="mb-4">
                    <label class="block text-grey-darker text-sm mb-2">Email
                    </label>
                    <input class=" border rounded w-full py-2 px-3 text-base outline-none focus:border-green-400"
                        type="text" placeholder="email" name="email" value="{{ old('email') }}">
                    @error('email')
                        <h1 class="text-red-400">{{ $message }}</h1>
                    @enderror
                </div>
                <div class="mb-4">
                    <label class="block text-grey-darker text-sm  mb-2">Password</label>
                    <input class=" border rounded w-full py-2 px-3 text-base outline-none focus:border-green-400"
                        type="password" placeholder="password" name="password" value="{{ old('password') }}">
                    @error('password')
                        <h1 class="text-red-400">{{ $message }}</h1>
                    @enderror
                </div>
                <div class="mb-4">
                    <label class="block text-grey-darker text-sm  mb-2">Confirm Password</label>
                    <input class=" border rounded w-full py-2 px-3 text-base outline-none focus:border-green-400"
                        type="password" placeholder="confirm password" name="confirmPassword">
                    @error('confirmPassword')
                        <h1 class="text-red-400">{{ $message }}</h1>
                    @enderror
                </div>
                <div class="mb-4">
                    <input type="submit" value="Register"
                        class=" w-full cursor-pointer font-bold rounded-md bg-green-400 py-2 px-5 text-xl text-white transition hover:bg-green-500" />
                </div>
                <p class="text-center my-4">
                    <a href="{{ route('user.index') }}" class="text-green-500 text-md no-underline hover:text-green-400">I
                        already have an
                        account</a>
                </p>
            </form>
        </div>
    @endsection
