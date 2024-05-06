@extends('layouts.app')

@section('title', $competition->title)
@section('meta_description', $competition->meta_description)

@section('content')
    <article class="col-span-4 w-full md:col-span-3 h-full flex flex-col items-center">
        <div class="w-full h-[75vh] bg-cover bg-center" style="background-image: url('{{ $competition->getFirstMediaUrl() }}');">>
        </div>
        <div class="flex flex-col px-5 bg-white -mt-20 z-20 w-5/6">
            <div class="flex flex-col items-center justify-center p-5 gap-5">
                <h2 class="text-sm font-normal">{{ $competition->subCategories }}</h2>
                <h1 class="text-3xl font-medium text-wrap max-w-2xl text-center">
                    {{ $competition->title }}
                </h1>
                <p class="text-[10px] md:text-sm font-normal">{!! \Carbon\Carbon::parse($competition->published_at)->format('d F Y, H:i') !!}</p>
            </div>

            <div class="flex flex-col lg:flex-row items-center justify-start w-full px-10 gap-5">
                <div class="flex flex-col w-full lg:w-3/4">
                    <div class="mt-2 flex flex-row justify-between w-full border-b border-t border-gray-200 py-2">
                        <div class="flex">
                            <p class="font-normal text-[10px] md:text-sm">Oleh: {{ $competition->user->name }}</p>
                        </div>
                        <div class="flex">
                            <span class="mr-2 md:text-sm text-gray-500">
                                {{ $competition->published_at->diffForHumans() }}
                            </span>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.3"
                                stroke="currentColor" class="h-5 w-5 text-gray-500">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                    </div>
                    <div class="text-sm md:text-base text-justify">
                        @php
                            $content = $competition->content;
                            // Tambahkan kelas jika tag <h1> ditemukan
                            $modifiedContent = preg_replace(
                                '/<h1>/',
                                '<h1 class="text-md font-regular text-justify mb-5">',
                                $content,
                            );
                            // Tambahkan kelas jika tag <h2h1> ditemukan
                            $modifiedContent = preg_replace(
                                '/<h2>/',
                                '<h2 class="text-md font-regular text-justify mb-5">',
                                $modifiedContent,
                            );
                            // Tambahkan kelas jika tag <h3> ditemukan
                            $modifiedContent = preg_replace(
                                '/<h3>/',
                                '<h3 class="text-md font-regular text-justify mb-5">',
                                $modifiedContent,
                            );
                            // Tambahkan kelas jika tag <p> ditemukan
                            $modifiedContent = preg_replace(
                                '/<p>/',
                                '<p class="text-md font-regular text-justify mb-5">',
                                $modifiedContent,
                            );
                            // Tambahkan kelas jika tag <li> ditemukan dalam <ol>
                            $modifiedContent = preg_replace(
                                '/<ol>(.*?)<li>/s',
                                '<ol class="text-md font-regular text-justify mb-5">$1<li class="list-decimal text-md font-regular text-justify ml-5 mb-2">',
                                $modifiedContent,
                            );
                            // Tambahkan kelas jika tag <li> ditemukan dalam <ul>
                            $modifiedContent = preg_replace(
                                '/<ul>(.*?)<li>/s',
                                '<ul class="text-md font-regular text-justify mb-5">$1<li class="list-disc text-md font-regular text-justify ml-5 mb-2">',
                                $modifiedContent,
                            );
                        @endphp
                        {!! $modifiedContent !!}
                    </div>
                    <div class="flex py-10">
                        <button type="button" class="text-white bg-[#0D5568] hover:bg-[#0D6568] focus:outline-none focus:ring-4 focus:ring-[#0D6668] font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-[#0D5568] dark:hover:bg-[#0D6568] dark:focus:ring-[#0D6668]"><a href="{{ $competition->link }}" target="_blank">
                            Informasi Lebih Lanjut</a></button>
                    </div>
                    {{-- <div
                        class="article-actions-bar my-6 flex flex-row items-center justify-between border-b border-t border-gray-200 px-2 py-2 text-sm">
                        <div class="flex">
                            <livewire:like-button :key="'like-' . $competition->id" :model="$post" />
                        </div>
                    </div> --}}
                </div>
                {{-- <div class="flex flex-col w-full lg:w-1/4 items-start justify-start rounded-md border-[1.5px] px-3">
                    <h1 class="text-xl text-center pb-3 font-bold">{{ $competition->categories->name }} TERKINI</h1>
                    @foreach ($populars as $item)
                        <a href="{{ route('competitions.show', ['category' => $item->category, 'competition' => $item->slug]) }}">
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
                </div> --}}
            </div>
        </div>

        {{-- <div class="flex flex-row justify-center lg:justify-start w-full lg:w-3/4">
            <livewire:post-comments :model="$post" />
        </div> --}}

        {{-- <div class="flex flex-row justify-center lg:justify-start w-full lg:w-3/4">
            <div class="flex flex-col w-full lg:w-1/2 items-start justify-start rounded-md px-3 my-10">
                <h1 class="text-xl text-center font-bold border-b-2 border-b-[#F5D05E]">{{ $competition->categories->name }} Terkait</h1>
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
        </div> --}}
    </article>
@endsection
