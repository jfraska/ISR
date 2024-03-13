@props([
    "post",
])
<article class="border-gray-100 pb-10 [&:not(:last-child)]:border-b">
    <div class="article-body mt-5 grid grid-cols-12 items-start gap-3">
        <div class="article-thumbnail col-span-4 flex items-center">
            <a href="">
                <img
                    class="mx-auto w-40 max-w-60 rounded-xl"
                    src="BI9HV5kf8IXerxWUisqbbh2YJkfKWMpB"
                    ="BI9HV5kf8IXerxWUisqbbh2YJkfKWMpB"
                    alt="{{ $post->title }}"
                />
            </a>
        </div>
        <div class="col-span-8">
            <div class="article-meta flex items-center py-1 text-sm">
                <img
                    class="mr-3 h-7 w-7 rounded-full"
                    src="{{ $post->user->profile_photo_url }}"
                    alt="{{ $post->user->name }}"
                />
                <span class="mr-1 text-xs">{{ $post->user->name }}</span>
                <span class="text-xs text-gray-500">
                    . {{ $post->published_at->diffForHumans() }}
                </span>
            </div>
            <h2 class="text-xl font-bold text-gray-900">
                <a wire:navigate href="{{ route("posts.show", $post->slug) }}">
                    {{ $post->title }}
                </a>
            </h2>

            <p class="mt-2 text-base font-light text-gray-700">
                {{ $post->excerpt() }}
            </p>
            <div
                class="article-actions-bar mt-6 flex items-center justify-between"
            >
                <div class="flex gap-x-2">
                    @foreach ($post->tags as $tag)
                        <x-posts.tag-badge :tag="$tag" />
                    @endforeach

                    <div class="flex items-center space-x-4">
                        <span class="text-sm text-gray-500">
                            {{ $post->getReadingTime() }} min read
                        </span>
                    </div>
                </div>

                <div>
                    <livewire:like-button
                        :key="'like-' . $post->id"
                        :model="$post"
                    />
                </div>
            </div>
        </div>
    </div>
</article>
