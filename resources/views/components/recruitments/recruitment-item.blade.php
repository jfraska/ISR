@props(['recruitment'])

<article class="border-gray-100 pb-10 [&:not(:last-child)]:border-b">
    <div class="article-body mt-5 grid grid-cols-12 items-start gap-3">
        <div class="article-thumbnail col-span-4 flex items-center">
            <a
                href="{{ route('recruitments.show', ['category' => $recruitment->categories->first()->slug, 'recruitment' => $recruitment->slug]) }}">
                <img class="mx-auto w-full h-[100px] md:h-[220px] rounded-xl" src={{ $recruitment->getFirstMediaUrl() }}
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
            <h2 class="text-sm md:text-base font-bold text-gray-900">
                <a
                    href="{{ route('recruitments.show', ['category' => $recruitment->categories->first()->slug, 'recruitment' => $recruitment->slug]) }}">
                    {{ $recruitment->title }} </a>
            </h2>
            <p class="block md:hidden mt-2 text-xs font-light text-gray-700">
                {{ Illuminate\Support\Str::limit(strip_tags($recruitment->excerpt()), 50) }}
            </p>
            <p class="hidden md:block lg:hidden mt-2 text-sm font-light text-gray-700">
                {{ Illuminate\Support\Str::limit(strip_tags($recruitment->excerpt()), 300) }}
            </p>
            <p class="hidden lg:block mt-2 text-sm font-light text-gray-700">
                {{ Illuminate\Support\Str::limit(strip_tags($recruitment->excerpt()), 400) }}
            </p>
            <div class="article-actions-bar mt-6 flex items-center justify-between">
                {{-- <div class="flex gap-x-2 justify-end">
                    <div class="flex items-center space-x-4">
                        <span class="text-sm text-gray-500">
                            {{ $recruitment->getReadingTime() }} min read
                        </span>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
</article>
