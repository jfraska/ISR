@extends('layouts.app')

@section('title', "Merchandise $merchandise->title")

@section('content')
    <div class="flex flex-col">
        <div class="py-24 px-20 flex flex-row items-center justify-center">
            <div class="w-3/4 bg-white border border-gray-200 shadow dark:bg-gray-800 dark:border-gray-700">
                <a href="#">
                    <img class="p-3 w-full h-[450px]" src="{{ $merchandise->getFirstMediaUrl() }}" alt="merchandise-image" />
                </a>
                <div class="p-3">
                    <p class="mb-3 text-4xl  font-normal text-[#0D5568] dark:text-gray-400">Rp. {{ $merchandise->price }}
                    </p>
                    <a href="#">
                        <h5 class="mb-2 text-3xl font-bold tracking-tight text-gray-900 dark:text-white">
                            {{ $merchandise->title }}</h5>
                    </a>
                    <h2 class="text-[#0D5568] text-xl py-2">Deskripsi Produk</h2>
                    <p class="text-2xl">{!! $merchandise->description !!}</p>
                </div>
                <div class="p-5 flex items-center justify-center">
                    <a href="#"
                        class="flex items-center justify-center px-3 py-2 w-3/4 h-[100px] text-4xl font-medium text-center text-white bg-[#0D5568] hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        BELI SEKARANG
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
