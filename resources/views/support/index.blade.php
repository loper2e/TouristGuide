@extends('layouts.app')


@section('structure')
    <div class="w-screen h-32 absolute">
        <div class="ml-64 -mt-4">
            @include('layouts.messagetoast')
        </div>
    </div>

    <section class="relative z-10 overflow-hidden bg-white py-20 lg:py-[120px]">
        <div class="container mx-auto">
            <div class="-mx-4 flex flex-wrap  lg:justify-between">
                <div class="w-full lg:pt-[130px] px-4 lg:w-1/2 xl:w-6/12">
                    <div class="mb-12 max-w-[570px] lg:mb-0">
                        <span class="text-primary mb-4 block text-base font-semibold">
                            Contact Us
                        </span>
                        <h2 class="text-dark mb-6 text-[32px]  uppercase sm:text-[40px] lg:text-[36px] xl:text-[40px]">
                            power us by your help.
                        </h2>
                        <p class="text-body-color mb-9 text-base leading-relaxed">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eius
                            tempor incididunt ut labore et dolore magna aliqua. Ut enim adiqua
                            minim veniam quis nostrud exercitation ullamco.
                        </p>

                    </div>
                </div>
                <div class="w-full px-4 lg:w-1/2 xl:w-5/12">
                    <div class="relative rounded-lg bg-white p-8 shadow-lg sm:p-12">
                        <form action="{{ route('support.store') }}" method="POST">
                            @csrf
                            <div class="mb-6">
                                <input type="text" name="name" placeholder="Your Name"
                                    class="text-body-color focus:border-green-500 w-full rounded border py-3 px-[14px] text-base outline-none focus-visible:shadow-none" />
                            </div>
                            @error('name')
                                <h1 class="text-red-400">{{ $message }}</h1>
                            @enderror
                            <div class="mb-6">
                                <input type="email" name="email" placeholder="Your Email"
                                    class="text-body-color focus:border-green-500 w-full rounded border py-3 px-[14px] text-base outline-none focus-visible:shadow-none" />
                            </div>
                            @error('email')
                                <h1 class="text-red-400">{{ $message }}</h1>
                            @enderror
                            <div class="mb-6">
                                <textarea rows="6" name="message" placeholder="Your Message"
                                    class="text-body-color focus:border-green-500 w-full resize-none rounded border py-3 px-[14px] text-base outline-none focus-visible:shadow-none"></textarea>
                                @error('message')
                                    <h1 class="text-red-400">{{ $message }}</h1>
                                @enderror
                            </div>
                            <div>
                                <button type="submit"
                                    class="bg-green-400 w-full rounded border p-3 text-white transition hover:bg-green-500">
                                    Send Message
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
