@props(['recruitment'])

<article class="border-gray-100 pb-10 [&:not(:last-child)]:border-b">
    <div class="article-body mt-5 grid grid-cols-12 items-start gap-3">
        <div class="article-thumbnail col-span-4 flex items-center">
            <a href="{{ route('recruitments.show', ['category' => $recruitment->category, 'recruitment' => $recruitment->slug]) }}">
                <img class="mx-auto w-full h-[220px] rounded-xl" src={{ $recruitment->getFirstMediaUrl() }}
                    alt="{{ $recruitment->title }}" />
            </a>
        </div>
        <div class="col-span-8 pl-3">
            <div class="article-meta flex items-center py-1 text-sm">
                <span class="mr-1 text-xs">{{ $recruitment->user->name }}</span>
                <span class="text-xs text-gray-500">
                    . {{ $recruitment->published_at->diffForHumans() }}
                </span>
            </div>
            <h2 class="text-md font-bold text-gray-900">
                <a href="{{ route('recruitments.show', ['category' => $recruitment->category, 'recruitment' => $recruitment->slug]) }}">
                    {{ $recruitment->title }} </a>
            </h2>
            @php
                $strippedExcerpt = Illuminate\Support\Str::limit(strip_tags($recruitment->excerpt()), 200);
            @endphp

            <p class="mt-2 text-sm font-light text-gray-700">
                {{ $strippedExcerpt }}
            </p>
            <div class="article-actions-bar mt-6 flex items-center justify-between">
                <div class="flex gap-x-2">
                    @foreach ($recruitment->tags as $tag)
                        <x-badge wire:navigate href="{{ route('recruitments.index', ['tag' => $tag->slug]) }}">
                            {{ $tag->name }}
                        </x-badge>
                    @endforeach

                    <div class="flex items-center space-x-4">
                        <span class="text-sm text-gray-500">
                            {{ $recruitment->getReadingTime() }} min read
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</article>
