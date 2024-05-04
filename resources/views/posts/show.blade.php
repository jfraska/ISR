@extends('layouts.app')

@section('title', $post->title)
@section('meta_description', $post->meta_description)

@section('content')
    <article class="col-span-4 w-full md:col-span-3 h-full flex flex-col items-center">
        <div class="w-full h-[75vh] bg-cover bg-center" style="background-image: url('{{ $post->getFirstMediaUrl() }}');">>
        </div>
        <div class="flex flex-col px-5 bg-white -mt-20 z-20 w-5/6">
            <div class="flex flex-col items-center justify-center p-5 gap-5">
                <h2 class="text-sm font-normal">{{ $subCategory }}</h2>
                <h1 class="text-3xl font-medium text-wrap max-w-2xl text-center">
                    {{ $post->title }}
                </h1>
                <p class="text-[10px] md:text-sm font-normal">{!! \Carbon\Carbon::parse($post->published_at)->format('d F Y, H:i') !!}</p>
            </div>

            <div class="flex flex-col lg:flex-row items-center justify-start w-full px-10 gap-5">
                <div class="flex flex-col w-full lg:w-3/4">
                    <div class="mt-2 flex flex-row justify-between w-full border-b border-t border-gray-200 py-2">
                        <div class="flex">
                            <p class="font-normal text-[10px] md:text-sm">Oleh: {{ $post->user->name }}</p>
                            <span class="text-[10px] md:text-sm text-gray-500">
                                &nbsp;|&nbsp;{{ $post->getReadingTime() }} min read
                            </span>
                        </div>
                        <div class="flex">
                            <span class="mr-2 md:text-sm text-gray-500">
                                {{ $post->published_at->diffForHumans() }}
                            </span>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.3"
                                stroke="currentColor" class="h-5 w-5 text-gray-500">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                    </div>
                    <x-content :items="$post->content" />
                    <div
                        class="article-actions-bar my-6 flex flex-row items-center justify-between border-b border-t border-gray-200 px-2 py-2 text-sm">
                        <div class="flex flex-row gap-x-2">
                            @foreach ($post->tags as $tag)
                                <x-badge wire:navigate href="{{ route('posts.index', ['tag' => $tag->slug]) }}">
                                    {{ $tag->name }}
                                </x-badge>
                            @endforeach
                        </div>
                        <div class="flex">
                            <livewire:like-button :key="'like-' . $post->id" :model="$post" />
                        </div>
                    </div>
                </div>
                <div class="flex flex-col w-full lg:w-1/4 items-start justify-start rounded-md border-[1.5px] px-3">
                    <h1 class="text-xl text-center pb-3 font-bold">{{ $post->categories->name }} TERKINI</h1>
                    @foreach ($populars as $item)
                        <a href="{{ route('posts.show', ['category' => $item->category, 'post' => $item->slug]) }}">
                            <div class="flex flex-row w-full py-2 gap-2 items-start justify-start">
                                <div class="w-1/4 rounded-md">
                                    <img src="{{ $item->getFirstMediaUrl() }}" alt="Img" class="aspect-square">
                                </div>
                                @php
                                    $strippedContent = Illuminate\Support\Str::limit(strip_tags($item->title), 50);
                                @endphp
                                <div class="flex flex-col w-3/4 items-start">
                                    <div class="text-xs font-semibold">{{ $strippedContent }}</div>
                                    <p class="text-xs font-medium">Read in {{ $item->getReadingTime() }} minutes</p>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="flex flex-row justify-center lg:justify-start w-full lg:w-3/4">
            <livewire:post-comments :model="$post" />
        </div>

        <div class="flex flex-row justify-center lg:justify-start w-full lg:w-3/4">
            <div class="flex flex-col w-full lg:w-1/2 items-start justify-start rounded-md px-3 my-10">
                <h1 class="text-xl text-center font-bold border-b-2 border-b-[#F5D05E]">{{ $post->categories->name }} Terkait</h1>
                @foreach ($relates as $item)
                    <a href="{{ route('posts.show', ['category' => $item->category, 'post' => $item->slug]) }}">
                        <div class="flex flex-row w-full py-4 gap-2 items-start justify-start">
                            @php
                                $strippedContent = Illuminate\Support\Str::limit(strip_tags($item->title), 75);
                            @endphp
                            <div class="flex flex-col items-start">
                                <div class="text-xs font-semibold">{{ $strippedContent }}</div>
                                <p class="text-xs font-medium">{!! \Carbon\Carbon::parse($item->published_at)->format('d F Y') !!}</p>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </article>
@endsection
