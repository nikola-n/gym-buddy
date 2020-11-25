<div>
    <h1 class="mb-4 text-2xl font-semibold text-gray-900">Blogs</h1>
    <div class="py-3 border-b border-gray-200">
        <span class="flex rounded-md justify-end">
            <a href="{{route('admin.blogs.create')}}" type="button"
               class="inline-flex items-center px-2.5 py-1.5 border border-transparent text-xs leading-4 font-medium rounded text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition ease-in-out duration-150">
                Create New Blog
            </a>
        </span>
    </div>
    <x-table>
        <x-slot name="head">
            <x-table.heading wire:click="sortBy('title')" label="Title" canSort="true" value="title" :sortField="$sortField" :sortAsc="$sortAsc" />
            <x-table.heading wire:click="sortBy('content')" label="Content" canSort="true" value="content" :sortField="$sortField" :sortAsc="$sortAsc" />
            <x-table.heading wire:click="sortBy('published')" label="Published" canSort="true" value="published" :sortField="$sortField" :sortAsc="$sortAsc" />
            <x-table.heading wire:click="sortBy('created_at')" label="Created at" canSort="true" value="created_at" :sortField="$sortField" :sortAsc="$sortAsc" />
            <x-table.heading />
        </x-slot>
        <x-slot name="body">
            @forelse($blogs as $blog)
                <x-table.row class="text-center" wire:key="blog-{{ $blog->id }}">
                    <x-table.cell>{{ $blog->title }}</x-table.cell>
                    <x-table.cell>{{ str_limit($blog->content, 30) }}</x-table.cell>
                    <x-table.cell>{{ $blog->published }}</x-table.cell>
                    <x-table.cell>{{ $blog->created_at }}</x-table.cell>
                    <x-table.cell>
                        <a href="{{ route('admin.blogs.edit', $blog) }}">Edit</a>
                    </x-table.cell>
                </x-table.row>
            @empty
                <x-table.row>
                    <x-table.cell colspan="4">
                        <div class="flex justify-center items-center space-x-2">
                            <x-icon.inbox class="h-8 w-8 text-cool-gray-400" />
                            <span class="font-medium py-8 text-cool-gray-400 text-xl">No blogs found...</span>
                        </div>
                    </x-table.cell>
                </x-table.row>
            @endforelse
        </x-slot>
    </x-table>

    <div class="mt-8">
        {{ $blogs->links() }}
    </div>
</div>
