<div id="posts" class="">
    {{-- <div class="flex items-center justify-between border-b border-gray-100">
        <div class="text-gray-600">
            @if ($this->activeTag || $search)
                <button
                    class="gray-500 mr-3 text-xs"
                    wire:click="clearFilters()"
                >
                    X
                </button>
            @endif

            @if ($this->activeTag)
                <x-badge
                    wire:navigate
                    href="{{ route('posts.index', ['tag' => $this->activeTag->slug]) }}"
                >
                    {{ $this->activeTag->name }}
                </x-badge>
            @endif

            @if ($search)
                <span class="ml-2">
                    containing :
                    <strong>{{ $search }}</strong>
                </span>
            @endif
        </div>
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
    </div> --}}
    <div class="">
        {{-- @foreach ($this->posts as $post)
            <x-posts.post-item wire:key="{{ $post->id }}" :post="$post" />
        @endforeach --}}
        @foreach ($this->posts as $post)
            <div class="rounded-lg shadow w-[400px] h-96 bg-[#0D5568]">
                <a href="{{ route('posts.show', $post->slug) }}">
                    <div class="flex flex-col h-80 relative rounded-lg"
                        style="background-image: url('{{ $post->getFirstMediaUrl() }}'); background-size: cover; background-position: center;">
                        <p class="absolute left-2 bottom-2 text-base font-semibold text-white text-wrap">{{$post->title}}</p>
                    </div>
                    <div class="p-5 flex items-center justify-center">
                        <h5 class="mb-2 text-base tracking-tight text-white text-center">{!! $post->published_at !!}</h5>
                    </div>
                </a>
            </div>
        @endforeach
    </div>

    <div class="my-3">
        {{ $this->posts->onEachSide(1)->links() }}
    </div>
</div>
