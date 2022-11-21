@extends('layouts.app')

@section('structure')
    <div class="container mx-auto  ">
        <div class="-mx-4 flex ">
            <div class="w-full px-4 ">
                <div
                    class="relative mx-auto border border-grey-500 my-36 max-w-[525px] overflow-hidden rounded-lg bg-white py-16 px-10 text-center sm:px-12 md:px-[60px]">
                    <div class="mb-10 text-center md:mb-16">
                        <a href="/" class="mx-auto inline-block ">
                            <h1 class="uppercase text-2xl "><span class="bg-green-500 p-2 text-white">tourist</span> guide
                            </h1>
                        </a>
                    </div>
                    <form action="{{ route('user.index') }}" method="GET">
                        @isset($error)
                            <h1 class="text-red-400">{{ $error }}</h1>
                        @endisset
                        <div class="mb-6">
                            <label class="block text-grey-darker text-sm mb-2 text-left">Email</label>
                            <input type="email" placeholder="Email" name="email" value="{{ old('email') }}"
                                class="border w-full rounded-md py-3 px-5 text-base outline-none focus:border-green-400" />
                        </div>
                        <div class="mb-6">
                            <label class="block text-grey-darker text-sm mb-2 text-left">Password</label>
                            <input type="password" placeholder="Password" name="password"
                                class=" w-full rounded-md border py-3 px-5 text-base outline-none focus:border-green-400" />
                        </div>
                        <div class="mb-10">
                            <input type="submit" value="Login"
                                class=" w-full cursor-pointer font-bold rounded-md bg-green-400 py-2 px-5 text-xl text-white transition hover:bg-green-500" />
                        </div>
                    </form>
                    <a href="" class="mb-2 inline-block text-base hover:text-green-500 ">
                        Forget Password?
                    </a>
                    <p class="text-base ">
                        Not a member yet?
                        <a href="{{ route('user.create') }}" class="text-green-500 hover:underline">
                            Register
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
