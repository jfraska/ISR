@extends('layouts.app')

@section('title', "Merchandise $merchandise->title")

@section('content')
    <div class="flex flex-col">
        <div class="flex flex-row">
            <img src="/images/showMerchandise.png" alt="merchandise" class="h-full w-full object-cover">
            <div class="flex justify-end items-center">
                <h1 class="font-black text-xl sm:text-4xl md:text-5xl lg:text-7xl absolute text-white pr-20">DETAIL PRODUK
                </h1>
            </div>
        </div>
        <div class="py-5 flex flex-row items-center justify-center">
            <div
                class="w-11/12 sm:w-5/6 md:w-4/5 lg:w-3/4 bg-white border border-gray-200 shadow dark:bg-gray-800 dark:border-gray-700">
                <div class="flex flex-col justify-center mx-auto w-10/12">
                    <div class="">
                        <img class="py-3 w-full" src="{{ $merchandise->getFirstMediaUrl() }}" alt="merchandise-image" />
                    </div>
                    <div class="flex flex-col justify-start">
                        <p class="mb-3 text-xl sm:text-3xl md:text-4xl font-bold text-[#0D5568] dark:text-gray-400">
                            Rp. {{ $merchandise->price }}
                        </p>
                        <a href="#">
                            <h5
                                class="mb-2 text-xl sm:text-3xl md:text-4xl font-bold tracking-tight text-gray-900 dark:text-white">
                                {{ $merchandise->title }}</h5>
                        </a>
                        <div class="container bg-gray-200 px-3">
                            <h2 class="text-[#0D5568] font-bold text-lg sm:text-xl md:text-2xl py-2">Deskripsi Produk</h2>
                            <p class="text-2xl">{!! $merchandise->description !!}</p>
                        </div>
                    </div>
                    <div class="py-7 flex items-center justify-center">
                        <a href="#"
                            class="flex items-center justify-center py-2 w-full h-[50px] text-xl sm:text-2xl md:text-3xl font-medium text-center text-white bg-[#0D5568] hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            BELI SEKARANG
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
