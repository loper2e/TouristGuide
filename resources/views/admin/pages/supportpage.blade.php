

@include('layouts.messagetoast')


<div class="mt-8 w-full p-20">
    <h2 class="text-lg font-medium mt-10">Supports
        <div
            class="inline-block min-w-full overflow-hidden align-middle border-b border-gray-200 shadow sm:rounded-lg mt-3">


            @foreach ($messages as $message)
                <div class=" rounded overflow-hidden bg-gray-100 mt-5">
                    <div class="px-6 py-2">
                        <div class=" flex justify-between">
                            <h1 class="font-bold text-xl capitalize">{{ $message['name'] }} <span><i
                                        class="bx bxs-circle {{ $message['readed'] ? 'text-green-600' : 'text-red-600' }}"></i></span>
                            </h1>
                            <div class="">
                                <p class="text-gray-700 text-base">from: {{ $message['username'] }}</p>
                                <p class="text-gray-700 text-base">
                                    Email: {{ $message['email'] }}
                                </p>
                            </div>
                        </div>
                        <p class="text-gray-700 text-base">
                            {{ $message['created_at'] }}
                        </p>
                        <div class="flex justify-between">

                            <button id='toglle'
                                onclick="{

                            const button = document.getElementById('toglle');
                            const text = document.getElementById('textlong');
                         if (text.classList.contains('hidden')) {
                             text.classList.remove('hidden') 
                             return button.textContent = 'Hide Message';
                         }
                         text.classList.add('hidden') 
                         button.textContent = 'See Message';  
                 
                         }"
                                class=" text-center pt-3 text-green-400 hover:text-green-500">See Message</button>
                          <div class="flex justify-between">
                            <form action="{{ route('support.update', $message['id']) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <button class="text-sm capitalize">mark us read</button>
                            </form>
                            <form class="ml-2" action="{{ route('support.destroy', $message['id']) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="text-sm capitalize"><i class="bx bxs-trash text-red-600"></i></button>
                            </form>
                          </div>
                        </div>

                    </div>
                    <p class="px-6 pb-3 hidden text-base" id="textlong">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita qui odit repudiandae totam hic
                        consectetur atque eius voluptas voluptates iure minima mollitia fuga blanditiis sit quisquam,
                        voluptate magni ad itaque.
                    </p>

                </div>
            @endforeach

            <div class="px-10 py-5 mt-10">
                {!! $messages->links() !!}
            </div>
        </div>
</div>
