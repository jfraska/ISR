@extends('layouts.app')

@section('title', 'Posts')

@section('content')
    <article class="col-span-4 w-full min-h-[2000px] md:col-span-3 flex flex-col items-center">
        <div class="w-full h-[75vh] bg-cover bg-center" style="background-image: url('/images/thumbnail-detail.png');">>
        </div>
        <div class="px-5 bg-white -mt-20 z-20 w-5/6">
            <div class="grid w-full grid-cols-4 gap-10 pt-16">
                <div class="col-span-4 md:col-span-3">
                    <h1 class="text-uppercase text-4xl font-bold">{{ $category->name }} terkini</h1>
                    <livewire:post-list :category="$category">
                </div>
                <div id="side-bar" class="md:border-t-none top-0 col-span-4 h-screen space-y-10 pt-10 md:col-span-1 md:px-0">
                    <div class="flex flex-col gap-5 p-5 w-full h-auto rounded-lg shadow">
                        @include('posts.partials.search-box')

                        @include('posts.partials.tags-box')
                    </div>

                    {{-- Category Dropdown Start --}}
                    <div class="flex w-full">
                        <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown"
                            class="w-60 h-10 text-black bg-white hover:bg-gray-100 font-medium rounded-lg text-sm px-2 py-0 text-center inline-flex items-center dark:bg-white dark:hover:bg-gray-200 justify-between"
                            type="button">
                            <h1 class="text-lg">Category</h1> <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m1 1 4 4 4-4" />
                            </svg>
                        </button>

                        <!-- Dropdown menu -->
                        <div id="dropdown" class="w-60 h-auto z-10 hidden rounded-lg shadow">
                            <ul class="py-2 text-sm" aria-labelledby="dropdownDefaultButton">
                                @if ($category->slug === 'artikel')
                                <li>
                                    <a href="{{ route('posts.detail', ['category' => 'isr-edu']) }}"
                                        class="block px-4 py-2 ">
                                        <div class="p-5 flex flex-col items-center h-full bg-cover bg-center rounded-lg"
                                            style="background-image: url('/images/sub-category/isr-journey.png');">
                                            <div
                                                class="w-40 h-10 border border-[#FFDF4E] flex items-center justify-center gap-4 rounded-2xl overflow-hidden">
                                                <img src="/images/sub-category/category-icon.svg" alt="category icon">
                                                <p class="text-center text-sm font-bold text-[#FFDF4E]">
                                                    ISR JOURNEY</p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('posts.detail', ['category' => 'isr-edu']) }}"
                                        class="block px-4 py-2 ">
                                        <div class="p-5 flex flex-col items-center h-full bg-cover bg-center rounded-lg"
                                            style="background-image: url('/images/sub-category/opini-refleksi.png');">
                                            <div
                                                class="w-40 h-10 border border-[#FFDF4E] flex items-center justify-center gap-4 rounded-2xl overflow-hidden">
                                                <img src="/images/sub-category/category-icon.svg" alt="category icon">
                                                <p class="text-center text-sm font-bold text-[#FFDF4E]">
                                                    OPINI & REFLEKSI</p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('posts.detail', ['category' => 'isr-edu']) }}"
                                        class="block px-4 py-2 ">
                                        <div class="p-5 flex flex-col items-center h-full bg-cover bg-center rounded-lg"
                                            style="background-image: url('/images/sub-category/tips-trick.png');">
                                            <div
                                                class="w-40 h-10 border border-[#FFDF4E] flex items-center justify-center gap-4 rounded-2xl overflow-hidden">
                                                <img src="/images/sub-category/category-icon.svg" alt="category icon">
                                                <p class="text-center text-sm font-bold text-[#FFDF4E]">
                                                    TIPS & TRICK</p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('posts.detail', ['category' => 'isr-edu']) }}"
                                        class="block px-4 py-2 ">
                                        <div class="p-5 flex flex-col items-center h-full bg-cover bg-center rounded-lg"
                                            style="background-image: url('/images/sub-category/prestasi-isr.png');">
                                            <div
                                                class="w-40 h-10 border border-[#FFDF4E] flex items-center justify-center gap-4 rounded-2xl overflow-hidden">
                                                <img src="/images/sub-category/category-icon.svg" alt="category icon">
                                                <p class="text-center text-sm font-bold text-[#FFDF4E]">
                                                    PRESTASI ISR</p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                @endif

                                @if ($category->slug === 'mini-blog')
                                <li>
                                    <a href="{{ route('posts.detail', ['category' => 'isr-edu']) }}"
                                        class="block px-4 py-2 ">
                                        <div class="p-5 flex flex-col items-center h-full bg-cover bg-center rounded-lg"
                                            style="background-image: url('/images/sub-category/fact-research.png');">
                                            <div
                                                class="w-40 h-10 border border-[#FFDF4E] flex items-center justify-center gap-4 rounded-2xl overflow-hidden">
                                                <img src="/images/sub-category/category-icon.svg" alt="category icon">
                                                <p class="text-center text-sm font-bold text-[#FFDF4E]">
                                                    FACT IN RESEARCH</p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('posts.detail', ['category' => 'isr-edu']) }}"
                                        class="block px-4 py-2 ">
                                        <div class="p-5 flex flex-col items-center h-full bg-cover bg-center rounded-lg"
                                            style="background-image: url('/images/sub-category/isr-edu.png');">
                                            <div
                                                class="w-40 h-10 border border-[#FFDF4E] flex items-center justify-center gap-4 rounded-2xl overflow-hidden">
                                                <img src="/images/sub-category/category-icon.svg" alt="category icon">
                                                <p class="text-center text-sm font-bold text-[#FFDF4E]">
                                                    ISR EDU</p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                @endif
                            </ul>
                        </div>
                    </div>
                    {{-- Category Dropdown End --}}

                    {{-- Post Populer Start --}}
                    <div class="flex flex-col w-60 h-auto rounded-md border-[1.5px] px-3">
                        <div class="text-xl text-center py-3 font-bold">{{ $category->name }} POPULER</div>
                        @foreach ($posts as $item)
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
                    {{-- Post Populer End --}}
                </div>
            </div>
        </div>
    </article>
@endsection
