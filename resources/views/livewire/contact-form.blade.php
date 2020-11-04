<div>
    <form class="w-full max-w-lg p-2 bg-gray-400 rounded">
        <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-headline">
            Contact Us
        </h3>
        <div class="mt-2">
            @if (session()->has('error') || session()->has('success'))
                <!-- Alerts -->
                    <div
                        class="px-4 py-3 rounded relative {{(session()->has('error') && !session()->has('success'))? 'bg-red-100 border border-red-400 text-red-700': 'bg-green-100 border border-green-400 text-green-700'}}"
                        role="alert"
                    >
                        <strong class="font-bold">Status: </strong>
                        <span class="block sm:inline">{{(session()->has('error') && !session()->has('success'))? session('error'): session('success')}}</span>
                        <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                  </span>
                    </div>
            @endif
        </div>
        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                    First Name
                </label>
                <input
                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                    id="grid-first-name"
                    type="text"
                    placeholder=""
                    wire:model="first_name"
                >
                @error('first_name') <span class="error border-red-500">{{ $message }}</span> @enderror
            </div>
            <div class="w-full md:w-1/2 px-3">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
                    Last Name
                </label>
                <input
                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                    id="grid-last-name"
                    type="text"
                    placeholder=""
                    wire:model="last_name"
                >
                @error('last_name') <span class="error border-red-500">{{ $message }}</span> @enderror
            </div>
        </div>
        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full px-3">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-email">
                    Email Address
                </label>
                <input
                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                    id="grid-email"
                    type="email"
                    placeholder=""
                    wire:model="email"
                >
                @error('email') <span class="error border-red-500">{{ $message }}</span> @enderror
            </div>
        </div>
        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full px-3">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-question">
                    Ask us a question
                </label>
                <textarea
                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                    id="grid-question"
                    wire:model="question"
                >
                </textarea>
                @error('question') <span class="error border-red-500">{{ $message }}</span> @enderror
            </div>
        </div>
        <button
            class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-green-600 text-base leading-6 font-medium text-white shadow-sm hover:bg-green-500 focus:outline-none focus:border-green-700 focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5"
            wire:click.prevent="$emit('save')"
        >
            Submit
        </button>
    </form>
</div>
