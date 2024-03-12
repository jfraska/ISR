@extends('layouts.app')

@section('title', $post->title)
@section('meta_description', $post->meta_description)


@section('content')
    <article class="w-full col-span-4 py-5 mx-auto mt-10 md:col-span-3" style="max-width:700px">
        <img class="w-full my-2 rounded-lg" src="{{ $post->getFirstMediaUrl() }}" alt="thumbnail">
        <h1 class="text-4xl font-bold text-left text-gray-800">
            {{ $post->title }}
        </h1>
        <div class="flex items-center justify-between mt-2">
            <div class="flex items-center py-5">
                <img class="mr-4 w-16 h-16 rounded-full" src="{{ $post->user->profile_photo_url }}"
                    alt={{ $post->user->name }}>
                <span class="text-sm text-gray-500">| {{ $post->getReadingTime() }} min read</span>
            </div>
            <div class="flex items-center">
                <span class="mr-2 text-gray-500">{{ $post->published_at->diffForHumans() }}</span>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.3"
                    stroke="currentColor" class="w-5 h-5 text-gray-500">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </div>
        </div>

        <div
            class="flex items-center justify-between px-2 py-4 my-6 text-sm border-t border-b border-gray-100 article-actions-bar">
            <div class="flex items-center">
                <livewire:like-button :key="'like-' . $post->id" :model="$post" />
            </div>
            <div>
                <div class="flex items-center">
                </div>
            </div>
        </div>

        <div class="py-3 text-lg prose text-justify text-gray-800 article-content">
            {!! $post->content !!}
        </div>

        <div class="flex items-center mt-10 space-x-4">
            @foreach ($post->tags as $tag)
                <x-posts.tag-badge :tag="$tag" />
            @endforeach
        </div>

        <livewire:post-comments :model="$post" />
    </article>
@endsection
