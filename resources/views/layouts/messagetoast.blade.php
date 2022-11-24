

@if (Session::get('message') != null && Session::get('code') != null)
<div class="md:container mx-auto relative">
    <div id="toast-success"
        class=" flex items-center border z-50 border-gray-500 absolute top-10 right-8 p-4 mb-4 w-full max-w-xs text-gray-600 bg-gray-100 rounded-lg shadow "
        role="alert">
        <div
            class="inline-flex flex-shrink-0 justify-center items-center w-8 h-8 {{ Session::get('code') == 'success' ? "text-green-500 bg-green-300" : "text-red-500 bg-red-300" }} rounded-lg ">
            <i class="bx {{ Session::get('code') == 'success' ? "bx-check" : "bx-x" }} text-3xl"></i>
        </div>
        <div class="ml-3 text-sm font-normal">{{ Session::get('message') }}</div>
        <button type="button"
            class="ml-auto mb-3 -mx-1.5 bg-gren-400 text-gray-400 hover:text-gray-900 rounded-lg p-1.5 hover:bg-gren-500 inline-flex h-8 w-8"
            data-dismiss-target="#toast-success" aria-label="Close">
            <i class="bx bx-x text-3xl"></i>
        </button>
    </div>
</div>
@endif


