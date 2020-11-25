@props([
'value' => '',
'label' => '',
'canSort' => false,
'sortField' => '',
'sortAsc' => '',
])

<th class="px-6 py-3 bg-white bg-cool-gray-200">
    <div class="flex justify-center">
        <button wire:click.prevent="sortBy('{{$value}}')" class="flex text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">{{$label}}
            @if($canSort)
                @if($sortField === $value)
                    @if($sortAsc)
                        <svg class="ml-2 w-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"></path>
                        </svg>
                    @else
                        <svg class="ml-2 w-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    @endif
                @else
                    <span></span>
                @endif
            @endif
        </button>
    </div>
</th>
