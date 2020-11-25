<div>
    <form class="space-y-6" wire:submit.prevent="login" method="POST">
        @csrf
        <div>
            <label for="email" class="block text-sm font-medium text-gray-700">
                Email address
            </label>
            <div class="mt-1 rounded-md shadow-sm">
                <input wire:model="email" id="email" type="email" required class="@error('email') border-red-600 @enderror appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>
            @error('email')
            <div class="mt-1 text-red-600 text-sm">{{ $message }}</div> @enderror
        </div>

        <div class="mt-6">
            <label for="password" class="block text-sm font-medium leading-5 text-gray-700">
                Password
            </label>
            <div class="mt-1 rounded shadow-sm">
                <input  wire:model.lazy="password" id="password" type="password" required class="@error('password') border-red-600 @enderror appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>
            @error('password')
            <div class="mt-1 text-red-500 text-sm">{{ $message }}</div> @enderror
        </div>
        <div class="mt-6">
             <span class="block w-full rounded-md shadow-sm">
                <button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition duration-150 ease-in-out">
                    Log In
                </button>
            </span>
        </div>
    </form>

</div>
