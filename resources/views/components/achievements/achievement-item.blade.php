@props([
    "achievement",
])

<article class="border-gray-100 pb-10 [&:not(:last-child)]:border-b">
    <div
        class="article-body mt-5 grid grid-cols-1 items-start gap-3 md:grid-cols-12"
    >
        <div
            class="article-thumbnail col-span-1 flex items-center md:col-span-4"
        >
            <a
                href="{{ route("achievements.show", ["achievement" => $achievement->slug]) }}"
            >
                <img
                    class="h-40 w-full rounded"
                    src="BvvRHZMHkx4xNxVbK98ud21mfflQjx7VUBq9vqB"
                    alt="{{ $achievement->title }}"
                />
            </a>
        </div>
        <div class="col-span-1 pl-3 md:col-span-8">
            <div class="article-meta flex items-center py-1 text-sm">
                <span class="mr-1 text-xs">
                    {{ $achievement->user->name }}
                </span>
                <span class="text-xs text-gray-500">
                    . {{ $achievement->published_at->diffForHumans() }}
                </span>
            </div>
            <h2 class="text-sm font-bold text-gray-900 md:text-base">
                <a
                    href="{{ route("achievements.show", ["category" => $achievement->category, "achievement" => $achievement->slug]) }}"
                >
                    {{ $achievement->title }}
                </a>
            </h2>
            <p class="mt-2 block text-xs font-light text-gray-700 md:hidden">
                {{ Illuminate\Support\Str::limit(strip_tags($achievement->content), 50) }}
            </p>
            <p
                class="mt-2 hidden text-sm font-light text-gray-700 md:block lg:hidden"
            >
                {{ Illuminate\Support\Str::limit(strip_tags($achievement->content), 300) }}
            </p>
            <p class="mt-2 hidden text-sm font-light text-gray-700 lg:block">
                {{ Illuminate\Support\Str::limit(strip_tags($achievement->content), 400) }}
            </p>
        </div>
    </div>
</article>
