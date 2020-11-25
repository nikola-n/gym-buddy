<div>
    <div class="mt-6 sm:mt-5 space-y-6 flex">

        <form wire:submit.prevent="submit()">
            <x-input.group for="title" inline label="Title" :error="$errors->first('title')">
                <x-input.text type="text" wire:model="blog.title" />
            </x-input.group>
            <x-input.group label="Content" for="content" :error="$errors->first('content')">
                <x-input.rich-text wire:model.defer="blog.content" id="content"></x-input.rich-text>
            </x-input.group>
            <x-input.group label="Published" for="published" :error="$errors->first('published')">
                <x-input.checkbox wire:model="blog.published" />
            </x-input.group>
            <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition duration-150 ease-in-out">
                Save
            </button>
        </form>
    </div>
</div>
