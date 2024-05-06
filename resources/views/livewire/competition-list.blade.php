<div id="competitions" class="px-3 py-6 lg:px-7">
    <div class="flex items-center justify-between border-b border-gray-100">
        <div
            id="filter-selector"
            class="flex items-center space-x-4 font-light"
        >
            <button
                class="{{ $sort === "desc" ? "border-b border-gray-700 text-gray-900" : "text-gray-500" }} py-4 text-gray-500"
                wire:click="setSort('desc')"
            >
                Latest
            </button>
            <button
                class="{{ $sort === "asc" ? "border-b border-gray-700 text-gray-900" : "text-gray-500" }} py-4 text-gray-900"
                wire:click="setSort('asc')"
            >
                Oldest
            </button>
        </div>
    </div>
    <div class="py-4">
        @foreach ($this->competitions as $competition)
            <x-competitions.competition-item
                wire:key="{{ $competition->id }}"
                :competition="$competition"
            />
        @endforeach
    </div>

    <div class="my-3">
        {{ $this->competitions->onEachSide(1)->links() }}
    </div>
</div>
