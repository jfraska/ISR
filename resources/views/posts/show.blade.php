@extends('layouts.app')

@section('title', $post->title)
@section('meta_description', $post->meta_description)

@section('content')
    <article class="col-span-4 w-full md:col-span-3 h-full flex flex-col items-center">
        <div class="w-full h-[75vh] bg-cover bg-center" style="background-image: url('{{ $post->getFirstMediaUrl() }}');">>
        </div>
        <div class="flex flex-col px-5 bg-white -mt-20 z-20 w-5/6">
            <div class="flex flex-col items-center justify-center p-5 gap-5">
                <h2 class="text-sm font-normal">{{ $post->categories->name }}</h2>
                <h1 class="text-3xl font-medium text-wrap max-w-lg text-center">
                    {{ $post->title }}
                </h1>
                <p class="text-sm font-normal">{{ $post->published_at }}</p>
            </div>

            <div class="flex flex-row items-center justify-start w-full px-10 gap-5">
                <div class="flex flex-col w-3/4">
                    <div class="mt-2 flex flex-row justify-between w-full border-b border-t border-gray-200 py-2">
                        <div class="flex">
                            <p class="font-normal text-sm">Oleh: {{ $post->user->name }}</p>
                            <span class="text-sm text-gray-500">
                                &nbsp;|&nbsp;{{ $post->getReadingTime() }} min read
                            </span>
                        </div>
                        <div class="flex">
                            <span class="mr-2 text-gray-500">
                                {{ $post->published_at->diffForHumans() }}
                            </span>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.3"
                                stroke="currentColor" class="h-5 w-5 text-gray-500">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                    </div>
                    @foreach ($post->content as $item)
                        @if ($item['type'] === 'paragraph')
                            <div class="article-content prose py-5 text-justify text-base text-gray-800 w-full">
                                {!! $item['data']['content'] !!}
                            </div>
                        @endif
                        <div class="w-[200px] bg-blue-800 h-full">

                        </div>
                    @endforeach
                    <div
                        class="article-actions-bar my-6 flex flex-row items-end justify-end border-b border-t border-gray-200 px-2 py-2 text-sm">
                        <div class="flex items-end">
                            <livewire:like-button :key="'like-' . $post->id" :model="$post" />
                        </div>
                        <div>
                            <div class="flex items-center"></div>
                        </div>
                    </div>
                </div>
                <div class="flex bg-black w-[200px] h-[500px]">
                </div>
            </div>
        </div>

        {{-- <div class="mt-10 flex items-center space-x-4">
            @foreach ($post->tags as $tag)
                <x-posts.tag-badge :tag="$tag" />
            @endforeach
        </div> --}}

        {{-- <livewire:post-comments :model="$post" /> --}}
    </article>
@endsection