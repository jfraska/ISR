@props(['achievement'])

<article class="border-gray-100 pb-10 [&:not(:last-child)]:border-b">
    <div class="article-body mt-5 grid grid-cols-12 items-start gap-3">
        <div class="article-thumbnail col-span-4 flex items-center">
            <a href="{{ route('achievements.show', ['achievement' => $achievement->slug]) }}">
                <img class="mx-auto w-full h-[220px] rounded-xl" src={{ $achievement->getFirstMediaUrl() }}
                    alt="{{ $achievement->title }}" />
            </a>
        </div>
        <div class="col-span-8 pl-3">
            <div class="article-meta flex items-center py-1 text-sm">
                <span class="mr-1 text-xs">{{ $achievement->user->name }}</span>
                <span class="text-xs text-gray-500">
                    . {{ $achievement->published_at->diffForHumans() }}
                </span>
            </div>
            <h2 class="text-md font-bold text-gray-900">
                <a href="{{ route('achievements.show', ['category' => $achievement->category, 'achievement' => $achievement->slug]) }}">
                    {{ $achievement->title }} </a>
            </h2>
            @php
                $strippedExcerpt = Illuminate\Support\Str::limit(strip_tags($achievement->content), 450);
            @endphp

            <p class="mt-2 text-sm font-light text-gray-700">
                {{ $strippedExcerpt }}
            </p>
        </div>
    </div>
</article>
