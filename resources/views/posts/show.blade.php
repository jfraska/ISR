@extends("layouts.app")

@section("title", $post->title)
@section("meta_description", $post->meta_description)

@section("content")
    <article
        class="col-span-4 mx-auto mt-10 w-full py-5 md:col-span-3"
        style="max-width: 700px"
    >
        <img
            class="my-2 w-full rounded-lg"
            src="{{ $post->getFirstMediaUrl() }}"
            alt="thumbnail"
        />
        <h1 class="text-left text-4xl font-bold text-gray-800">
            {{ $post->title }}
        </h1>
        <div class="mt-2 flex items-center justify-between">
            <div class="flex items-center py-5">
                <img
                    class="mr-4 h-16 w-16 rounded-full"
                    src="{{ $post->user->profile_photo_url }}"
                    alt="{{ $post->user->name }}"
                />
                <span class="text-sm text-gray-500">
                    | {{ $post->getReadingTime() }} min read
                </span>
            </div>
            <div class="flex items-center">
                <span class="mr-2 text-gray-500">
                    {{ $post->published_at->diffForHumans() }}
                </span>
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke-width="1.3"
                    stroke="currentColor"
                    class="h-5 w-5 text-gray-500"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z"
                    />
                </svg>
            </div>
        </div>

        <div
            class="article-actions-bar my-6 flex items-center justify-between border-b border-t border-gray-100 px-2 py-4 text-sm"
        >
            <div class="flex items-center">
                <livewire:like-button
                    :key="'like-' . $post->id"
                    :model="$post"
                />
            </div>
            <div>
                <div class="flex items-center"></div>
            </div>
        </div>

        @foreach ($post->content as $item)
            @if ($item["type"] === "paragraph")
                <div
                    class="article-content prose py-3 text-justify text-lg text-gray-800"
                >
                    {!! $item["data"]["content"] !!}
                </div>
            @endif
        @endforeach

        <div class="mt-10 flex items-center space-x-4">
            @foreach ($post->tags as $tag)
                <x-posts.tag-badge :tag="$tag" />
            @endforeach
        </div>

        <livewire:post-comments :model="$post" />
    </article>
@endsection
