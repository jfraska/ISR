<div>
    <div class="flex items-center justify-between border-b border-gray-100">
        <div class="text-gray-600">
            @if ($search)
                <button class="gray-500 mr-3 text-xs" wire:click="clearFilters()">
                    X
                </button>
            @endif

            @if ($search)
                <span class="ml-2">
                    containing :
                    <strong>{{ $search }}</strong>
                </span>
            @endif
        </div>
        <div id="filter-selector" class="flex items-center space-x-4 font-light">
            <button
                class="{{ $sort === 'desc' ? 'border-b border-gray-700 text-gray-900' : 'text-gray-500' }} py-4 text-gray-500"
                wire:click="setSort('desc')">
                Latest
            </button>
            <button
                class="{{ $sort === 'asc' ? 'border-b border-gray-700 text-gray-900' : 'text-gray-500' }} py-4 text-gray-900"
                wire:click="setSort('asc')">
                Oldest
            </button>
        </div>
    </div>
    <div class="py-4">
        @foreach ($this->achievements as $achievement)
            <x-achievements.achievement-item wire:key="{{ $achievement->id }}" :achievement="$achievement" />
        @endforeach
    </div>

    <div class="my-3">
        {{ $this->achievements->onEachSide(1)->links() }}
    </div>
</div>
