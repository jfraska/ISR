@props(['post'])
<article class="[&:not(:last-child)]:border-b border-gray-100 pb-10">
    <div class="article-body grid grid-cols-12 gap-3 mt-5 items-start">
        <div class="article-thumbnail col-span-4 flex items-center">
            <a href="">
                <img class="max-w-60 w-40 mx-auto rounded-xl" src={{ $post->getFirstMediaUrl() }}
                    alt={{ $post->title }}>
            </a>
        </div>
        <div class="col-span-8">
            <div class="article-meta flex py-1 text-sm items-center">
                <img class="w-7 h-7 rounded-full mr-3" src="{{ $post->user->profile_photo_url }}"
                    alt={{ $post->user->name }}>
                <span class="mr-1 text-xs">{{ $post->user->name }}</span>
                <span class="text-gray-500 text-xs">. {{ $post->published_at->diffForHumans() }}</span>
            </div>
            <h2 class="text-xl font-bold text-gray-900">
                <a wire:navigate href="{{ route('posts.show', $post->slug) }}">
                    {{ $post->title }}
                </a>
            </h2>

            <p class="mt-2 text-base text-gray-700 font-light">
                {{ $post->excerpt() }}
            </p>
            <div class="article-actions-bar mt-6 flex items-center justify-between">
                <div class="flex gap-x-2">
                    @foreach ($post->tags as $tag)
                        <x-posts.tag-badge :tag="$tag" />
                    @endforeach
                    <div class="flex items-center space-x-4">
                        <span class="text-gray-500 text-sm">{{ $post->getReadingTime() }} min read</span>
                    </div>
                </div>

                <div>
                    <livewire:like-button :key="'like-' . $post->id" :model="$post" />
                </div>
            </div>
        </div>
    </div>
</article>
