@extends('layouts.app')

@section('title', $download->title)
@section('meta_description', $download->meta_description)

@section('content')
    <article class="col-span-4 w-full md:col-span-3 h-full flex flex-col items-center">
        <div class="w-full h-[75vh] bg-cover bg-center shadow-md" style="background-image: url('/images/artikel.png');">
        </div>
        <div class="flex flex-col px-5 bg-white -mt-20 z-20 w-11/12 md:w-5/6">
            <div class="flex flex-col items-center justify-center p-5 gap-5">
                <h2 class="text-sm font-normal">{{ $category->name }}</h2>
                <h1 class="text-3xl font-medium text-wrap max-w-lg text-center">
                    {{ $download->title }}
                </h1>
                <p class="text-[10px] md:text-sm font-normal">Published
                    {{ $download->published_at->format('d F, Y, h:i A') }}</p>
            </div>

            <div class="flex flex-col lg:flex-row items-start justify-start w-full px-2 lg:px-10 gap-5">
                <div class="flex flex-col w-full lg:w-3/4">
                    <div class="mt-2 flex flex-row justify-between w-full border-b border-t border-gray-200 py-2">
                        <div class="flex">
                            <p class="font-normal text-[10px] md:text-sm">Oleh: {{ $download->user->name }}</p>
                            <span class="text-[10px] md:text-sm text-gray-500">
                                &nbsp;|&nbsp;{{ $download->getReadingTime() }} min read
                            </span>
                        </div>
                    </div>
                    <div class="article-content prose py-5 text-justify text-base text-gray-800 w-full">
                        <x-content :items="$download->content" contentType="download" />
                    </div>
                    <div
                        class="article-actions-bar my-6 flex flex-row items-end justify-end border-b border-t border-gray-200 px-2 py-2 text-sm">
                        <div class="flex items-end">
                            <livewire:like-button :key="'like-' . $download->id" :model="$download" />
                        </div>
                        <div>
                            <div class="flex items-center"></div>
                        </div>
                    </div>
                </div>
                <div class="flex w-full lg:w-1/4 py-2">
                    <div class="flex flex-col w-full rounded-md border-[1.5px] px-3">
                        <div class="text-xl font-medium pb-3">DOWNLOAD TERKINI</div>
                        @foreach ($downloads as $item)
                            <div class="flex flex-row w-full py-2">
                                <div class="w-1/3 rounded-md">
                                    <img src="{{ $item->getFirstMediaUrl() }}" alt="Img">
                                </div>
                                <div class="flex flex-col items-start">
                                    <div class="text-md font-medium">{{ $item->title }}</div>
                                    Read in {{ $item->getReadingTime() }} minutes
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        {{-- <div class="mt-10 flex items-center space-x-4">
            @foreach ($post->tags as $tag)
                <x-posts.tag-badge :tag="$tag" />
            @endforeach
        </div> --}}

        <div class="flex flex-row justify-center lg:justify-start w-full lg:w-3/4">
            <livewire:post-comments :model="$download" />
        </div>
    </article>
@endsection
