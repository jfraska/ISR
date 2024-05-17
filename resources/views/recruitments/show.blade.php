@extends('layouts.app')

@section('title', $recruitment->title)
@section('meta_description', $recruitment->meta_description)

@section('content')
    <article class="col-span-4 flex h-full w-full flex-col items-center md:col-span-3">
        <div class="h-[75vh] w-full bg-cover bg-center"
            style="
                background-image: url('{{ $recruitment->getFirstMediaUrl() }}');
            ">
        </div>
        <div class="z-20 -mt-20 w-5/6 rounded bg-white p-8">
            <x-breadcrumb :post="$recruitment" :category="$category" menu="recruitment" />
            <div class="flex flex-col items-center justify-center gap-5 p-5">
                <h2 class="text-sm font-normal">{{ $recruitment->categories->first()->name }}</h2>
                <h1 class="max-w-lg text-wrap text-center text-3xl font-medium">
                    {{ $recruitment->title }}
                </h1>
                <p class="text-sm font-normal">
                    {!! \Carbon\Carbon::parse($recruitment->published_at)->format('d F Y, H:i') !!}
                </p>
            </div>

            <div class="flex w-full flex-row items-center justify-start gap-5 px-10">
                <div class="flex w-full flex-col">
                    <div class="mt-2 flex w-full flex-row justify-between border-b border-t border-gray-200 py-2">
                        <div class="flex">
                            <p class="text-sm font-normal">
                                Oleh: {{ $recruitment->user->name }}
                            </p>
                        </div>
                        <div class="flex">
                            <span class="mr-2 md:text-sm text-gray-500">
                                {{ $recruitment->published_at->diffForHumans() }}
                            </span>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.3"
                                stroke="currentColor" class="h-5 w-5 text-gray-500">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                    </div>
                    <div class="article-content prose w-full py-5 text-justify text-base text-gray-800">
                        {!! $recruitment->content !!}
                        <button type="button"
                            class="mt-4 text-white bg-[#0D5568] hover:bg-[#0D6689] focus:ring-4 focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 "><a
                                href="{{ $recruitment->link }}" target="blank">Selengkapnya
                            </a></button>
                    </div>
                </div>
            </div>
        </div>
    </article>
@endsection
