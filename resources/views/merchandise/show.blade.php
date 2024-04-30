@extends('layouts.app')

@section('title', "Merchandise $merchandise->title")

@section('content')
    <div class="flex flex-col bg-gray-200">
        <div class="flex flex-row">
            <img src="/images/showMerchandise.png" alt="merchandise" class="h-ful lg:h-[50%] w-full">
            <div class="flex justify-end items-center">
                <h1 class="font-black text-xl sm:text-4xl md:text-5xl lg:text-7xl absolute text-white pr-20">DETAIL PRODUK
                </h1>
            </div>
        </div>
        <div class="flex flex-row items-center justify-center lg:py-5">
            <div class="w-full lg:w-4/5 bg-white">
                <div class="flex flex-col lg:flex-row item-start mx-auto w-full px-5 py-4">
                    <div class="lg:w-1/2 pr-4 pl-1">
                        <!--HTML CODE-->
                        <div class="max-w-2xl mx-auto">
                            <div id="default-carousel" class="relative overflow-hidden" data-carousel="static">
                                <!-- Carousel wrapper -->
                                <div class="relative h-80 md:h-96" data-carousel-inner>
                                    @foreach ($merchandise->getMedia() as $items)
                                        <div class="hidden ease-in-out" data-carousel-item>
                                            <img src="{{ $items->getUrl() }}" class="object-cover w-full h-full"
                                                alt="Slider">
                                        </div>
                                    @endforeach
                                </div>
                                <!-- Slider controls and indicators -->
                                <div class="flex justify-between items-center my-3">
                                    <!-- Button control left -->
                                    <button type="button"
                                        class="flex items-center justify-center w-10 h-full bg-gray-200/50 hover:bg-gray-300 focus:outline-none transition"
                                        data-carousel-prev>
                                        <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 19l-7-7 7-7"></path>
                                        </svg>
                                    </button>
                                    <!-- Slider indicators -->
                                    <div class="flex space-x-2 mx-2" data-carousel-indicators>
                                        @foreach ($merchandise->getMedia() as $items)
                                            <button type="button"
                                                class="w-[20%] h-auto bg-gray-400/50 focus:outline outline-[#F5D05E]"
                                                aria-current="true" aria-label="Slide 1" data-carousel-slide-to="0">
                                                <img src="{{ $items->getUrl() }}" class="object-cover w-full h-full"
                                                    alt="Slider">
                                            </button>
                                        @endforeach
                                    </div>
                                    <!-- Button control right -->
                                    <button type="button"
                                        class="flex items-center justify-center w-10 h-full bg-gray-200/50 hover:bg-gray-300 focus:outline-none transition"
                                        data-carousel-next>
                                        <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 5l7 7-7 7"></path>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="flex flex-col">
                            @foreach ($merchandise->getMedia() as $items)
                                <img class="h-[50%]" src="{{ $items->getUrl() }}" alt="merchandise-image" />
                            @endforeach
                        </div> --}}
                    </div>
                    <div class="lg:w-1/2 pl-1 lg:pl-4 pr-1 py-5 lg:py-0">
                        <div class="flex flex-col">
                            <a href="#">
                                <h5 class="mb-2 text-xl sm:text-3xl md:text-4xl font-semibold tracking-tight text-black">
                                    {{ $merchandise->title }}</h5>
                            </a>
                            <p class="mb-3 text-xl sm:text-3xl md:text-4xl font-semibold text-[#0D5568]">
                                Rp. {{ $merchandise->price }}
                            </p>
                            <div class="containe bg-gray-100 px-3">
                                <h2 class="text-[#0D5568] font-semibold text-lg sm:text-xl md:text-2xl py-2">Deskripsi
                                    Produk
                                </h2>
                                <p class="text-2xl">{!! $merchandise->description !!}</p>
                            </div>
                        </div>
                        <div class="py-7 flex items-center justify-center">
                            <a href="{!! $merchandise->link !!}" target="_blank"
                                class="flex items-center justify-center py-2 w-full h-[50px] text-xl sm:text-2xl md:text-3xl font-medium text-center text-white bg-[#0D5568] hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                BELI SEKARANG
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
