@props(['tag'])
<x-badge wire:navigate href="{{ route('posts.index', ['tag' => $tag->slug]) }}" :textColor="$tag->text_color" :bgColor="$tag->bg_color">
    {{ $tag->title }}
</x-badge>
