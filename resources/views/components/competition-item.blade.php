@props(['competition'])

<article class="border-gray-100 pb-10 [&:not(:last-child)]:border-b">
    <div class="article-body mt-5 grid grid-cols-12 items-start gap-3">
        <div class="article-thumbnail col-span-4 flex items-center">
            <a href="{{ route('competitions.show', ['category' => $competition->category, 'competition' => $competition->slug]) }}">
                <img class="ml-5 w-full h-28 rounded-xl" src={{ $competition->getFirstMediaUrl() }}
                    alt="{{ $competition->title }}" />
            </a>
        </div>
        <div class="col-span-8 pl-3">
            <div class="article-meta flex items-center py-1 text-sm">
                <span class="mr-1 text-xs">{{ $competition->user->name }}</span>
                <span class="text-xs text-gray-500">
                    . {{ $competition->published_at->diffForHumans() }}
                </span>
            </div>
            <h2 class="text-md font-bold text-gray-900">
                <a href="{{ route('competitions.show', ['category' => $competition->category, 'competition' => $competition->slug]) }}">
                    {{ $competition->title }} </a>
            </h2>
            @php
                $strippedExcerpt = Illuminate\Support\Str::limit(strip_tags($competition->content), 200);
            @endphp

            <p class="mt-2 text-sm font-light text-gray-700">
                {{ $strippedExcerpt }}
            </p>
        </div>
    </div>
</article>
