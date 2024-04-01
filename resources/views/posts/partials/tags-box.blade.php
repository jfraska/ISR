<div>
    <h3 class="mb-3 text-lg font-semibold text-gray-900">recommended topics</h3>
    <div class="topics flex flex-wrap justify-start gap-2">
        @foreach ($tags as $tag)
            <x-badge
                wire:navigate
                href="{{ route('posts.index', ['tag' => $tag->slug]) }}"
            >
                {{ $tag->name }}
            </x-badge>
        @endforeach
    </div>
</div>
