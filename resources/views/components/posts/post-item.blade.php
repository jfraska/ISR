@props([
    "post",
])

<article class="border-gray-100 pb-10 [&:not(:last-child)]:border-b">
    <div class="article-body mt-5 grid grid-cols-12 items-start gap-3">
        <div class="col-span-4">
            <a
                href="{{ route("posts.show", ["category" => $post->categories->slug, "post" => $post->slug]) }}"
            >
                <img
                    class="h-full w-full rounded"
                    src="B5kAk8u5ju0PKQtfv5nAh3KYX2oFWIyB"
                    ="B5kAk8u5ju0PKQtfv5nAh3KYX2oFWIyB"
                    alt="{{ $post->title }}"
                />
            </a>
        </div>
        <div class="col-span-8 pl-3">
            <div class="article-meta flex items-center py-1 text-sm">
                <span class="mr-1 text-xs">{{ $post->user->name }}</span>
                <span class="text-xs text-gray-500">
                    . {{ $post->published_at->diffForHumans() }}
                </span>
            </div>
            <h2 class="text-md font-bold text-gray-900">
                <a
                    href="{{ route("posts.show", ["category" => $post->categories->slug, "post" => $post->slug]) }}"
                >
                    {{ $post->title }}
                </a>
            </h2>
            @php
                $strippedExcerpt = Illuminate\Support\Str::limit(strip_tags($post->excerpt()), 200);
            @endphp

            <p class="mt-2 text-sm font-light text-gray-700">
                {{ $strippedExcerpt }}
            </p>
            <div
                class="article-actions-bar mt-6 flex items-center justify-between"
            >
                <div class="flex gap-x-2">
                    @foreach ($post->tags as $tag)
                        <x-badge
                            wire:navigate
                            href="{{ route('posts.index', ['tag' => $tag->slug]) }}"
                        >
                            {{ $tag->name }}
                        </x-badge>
                    @endforeach

                    <div class="flex items-center space-x-4">
                        <span class="text-sm text-gray-500">
                            {{ $post->getReadingTime() }} min read
                        </span>
                    </div>
                </div>

                <div class="flex gap-2">
                    <span class="flex gap-3">
                        <img src="/images/view.png" alt="view" class="w-5" />
                        {{ $post->getPageViews() }}
                    </span>
                    <livewire:like-button
                        :key="'like-' . $post->id"
                        :model="$post"
                    />
                </div>
            </div>
        </div>
    </div>
</article>
