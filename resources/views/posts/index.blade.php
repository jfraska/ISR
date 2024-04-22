@extends('layouts.app')

@section('title', 'Posts')

@section('content')
    <div class="flex flex-col flex-grow">
        <div class="flex flex-col">
            <img src="/images/artikel.png" alt="artikel" class="h-full w-full object-cover">
            <div class="flex">
                <nav class="flex flex-row w-full h-20 items-center justify-between px-96 bg-[#0D5568]">
                    <div id="artikel" class="text-2xl font-bold w-auto h-full p-6 text-white">
                        <a href="#" class="">Artikel</a>
                    </div>
                    <div id="news" class="text-2xl font-bold w-auto h-full p-6 text-white">
                        <a href="#" class="">News</a>
                    </div>
                    <div id="mini-blog" class="text-2xl font-bold w-auto h-full p-6 text-white">
                        <a href="#" class="">Mini Blog</a>
                    </div>
                </nav>
            </div>
        </div>

        {{-- <div class="grid w-full grid-cols-4 gap-10">
            <div class="col-span-4 md:col-span-3">
                @livewire('post-list')
            </div>
            <div id="side-bar"
                class="md:border-t-none sticky top-0 col-span-4 h-screen space-y-10 border-t border-gray-100 border-t-gray-100 px-3 py-6 pt-10 md:col-span-1 md:border-l md:px-6">
                @include('posts.partials.search-box')

                @include('posts.partials.tags-box')
            </div>
        </div> --}}

        {{-- Carousel Start --}}
        <section class="bg-white">
            <div class="p-10 flex items-center justify-center">
                <img src="/images/carousel/football.jpg" alt="carousel" class="w-[1250px] h-[750px] rounded-lg">
            </div>
        </section>
        {{-- Carousel End --}}

        {{-- Category Start --}}
        <section class="bg-white">
            <div class="p-10 flex flex-col gap-5 w-full">
                <div class="">
                    <h1 class="border-b-4 border-b-[#FFDF4E] text-4xl w-full pb-2">Category</h1>
                </div>
                <div class="p-10 w-auto h-[350px] bg-[#0D5568] rounded-lg flex flex-row items-center justify-start gap-10">
                    <div class="flex items-center justify-center w-72 h-72 rounded-lg shadow bg-slate-400">
                        <div class="p-5 relative flex flex-col items-center h-full gap-10"
                            style="background-image: url('/images/category/isr-edu.png'); background-size: cover; background-position: center;">
                            <div
                                class="w-[220px] h-[50px] border border-[#FFDF4E] flex items-center justify-center gap-4 rounded-2xl">
                                <img src="/images/category/category-icon.svg" alt="cat icon">
                                <a href="#" class="text-center text-sm font-bold text-[#FFDF4E]">ISR EDU</a>
                            </div>
                            <p class="font-medium text-base text-justify text-white">Edukasi tentang penelitian pengkajian,
                                SDGs, dan jenis penelitian</p>
                        </div>
                    </div>
                    <div class="flex items-center justify-center w-72 h-72 rounded-lg shadow bg-slate-400">
                        <div class="p-5 relative flex flex-col items-center h-full gap-10"
                            style="background-image: url('/images/category/isr-edu.png'); background-size: cover; background-position: center;">
                            <div
                                class="w-[220px] h-[50px] border border-[#FFDF4E] flex items-center justify-center gap-4 rounded-2xl">
                                <img src="/images/category/category-icon.svg" alt="cat icon">
                                <a href="#" class="text-center text-sm font-bold text-[#FFDF4E]">ISR EDU</a>
                            </div>
                            <p class="font-medium text-base text-justify text-white">Edukasi tentang penelitian pengkajian,
                                SDGs, dan jenis penelitian</p>
                        </div>
                    </div>
                    <div class="flex items-center justify-center w-72 h-72 rounded-lg shadow bg-slate-400">
                        <div class="p-5 relative flex flex-col items-center h-full gap-10"
                            style="background-image: url('/images/category/isr-edu.png'); background-size: cover; background-position: center;">
                            <div
                                class="w-[220px] h-[50px] border border-[#FFDF4E] flex items-center justify-center gap-4 rounded-2xl">
                                <img src="/images/category/category-icon.svg" alt="cat icon">
                                <a href="#" class="text-center text-sm font-bold text-[#FFDF4E]">ISR EDU</a>
                            </div>
                            <p class="font-medium text-base text-justify text-white">Edukasi tentang penelitian pengkajian,
                                SDGs, dan jenis penelitian</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        {{-- Category End --}}

        {{-- Posts Terbaru Start --}}
        <section class="bg-white">
            <div class="p-10 flex flex-col gap-5 w-full">
                <div class="">
                    <h1 class="border-b-4 border-b-[#FFDF4E] text-4xl w-full pb-2">Post Terbaru</h1>
                </div>
                <div
                    class="py-4 w-auto h-full bg-white rounded-lg flex flex-row items-center justify-start gap-8 flex-wrap">
                    @livewire("post-list")
                </div>
                <div class="flex justify-center">
                    <div
                        class="flex flex-row items-center justify-center rounded-xl bg-[#FFDF4E] w-1/4 h-1/6 gap-2 transition-transform duration-300 hover:scale-110">
                        <a href="#" class="p-3 text-lg font-bold">
                            LIHAT SELENGKAPNYA
                        </a>
                        <img src="/images/black-arrow.svg" alt="arrow" class="w-7 h-7" />
                    </div>
                </div>
        </section>
        {{-- Posts Terbaru End --}}

        {{-- Topik Start --}}
        <section>
            <div class="p-10 flex flex-col gap-5 w-full min-h-[600px]">
                <div class="">
                    <h1 class="border-b-4 border-b-[#FFDF4E] text-4xl w-full pb-2">Topik</h1>
                </div>
                <div class="py-4 w-auto h-full rounded-lg flex flex-row items-center justify-start gap-5 flex-wrap">
                    <div class="rounded-lg shadow w-[300px] h-32 bg-white px-4 py-3 flex justify-start items-center">
                        <a href="#">
                            <div class="flex flex-col">
                                <p class="text-3xl">Teknologi</p>
                                <p class="text-2xl text-gray-500">4 article total</p>
                            </div>
                        </a>
                    </div>
                    <div class="rounded-lg shadow w-[300px] h-32 bg-white px-4 py-3 flex justify-start items-center">
                        <a href="#">
                            <div class="flex flex-col">
                                <p class="text-3xl">Teknologi</p>
                                <p class="text-2xl text-gray-500">4 article total</p>
                            </div>
                        </a>
                    </div>
                    <div class="rounded-lg shadow w-[300px] h-32 bg-white px-4 py-3 flex justify-start items-center">
                        <a href="#">
                            <div class="flex flex-col">
                                <p class="text-3xl">Teknologi</p>
                                <p class="text-2xl text-gray-500">4 article total</p>
                            </div>
                        </a>
                    </div>
                    <div class="rounded-lg shadow w-[300px] h-32 bg-white px-4 py-3 flex justify-start items-center">
                        <a href="#">
                            <div class="flex flex-col">
                                <p class="text-3xl">Teknologi</p>
                                <p class="text-2xl text-gray-500">4 article total</p>
                            </div>
                        </a>
                    </div>
                    <div class="rounded-lg shadow w-[300px] h-32 bg-white px-4 py-3 flex justify-start items-center">
                        <a href="#">
                            <div class="flex flex-col">
                                <p class="text-3xl">Teknologi</p>
                                <p class="text-2xl text-gray-500">4 article total</p>
                            </div>
                        </a>
                    </div>
                    <div class="rounded-lg shadow w-[300px] h-32 bg-white px-4 py-3 flex justify-start items-center">
                        <a href="#">
                            <div class="flex flex-col">
                                <p class="text-3xl">Teknologi</p>
                                <p class="text-2xl text-gray-500">4 article total</p>
                            </div>
                        </a>
                    </div>
                    <div class="rounded-lg shadow w-[300px] h-32 bg-white px-4 py-3 flex justify-start items-center">
                        <a href="#">
                            <div class="flex flex-col">
                                <p class="text-3xl">Teknologi</p>
                                <p class="text-2xl text-gray-500">4 article total</p>
                            </div>
                        </a>
                    </div>
                </div>
        </section>
        {{-- Topik End --}}
    </div>

    <script>
        // JavaScript code to handle color change and conditional behavior
        document.addEventListener('DOMContentLoaded', function() {
            // Inisialisasi variabel kondisi
            let currentTab = 'artikel';

            // Fungsi untuk mengubah warna dan kondisi
            function switchTab(tabId) {
                // Hapus kelas warna dari tab saat ini
                document.getElementById(currentTab).classList.remove('border-b-4', 'border-b-[#F5D05E]');

                // Ubah variabel kondisi menjadi tab yang baru
                currentTab = tabId;

                // Tambahkan kelas warna ke tab baru
                document.getElementById(tabId).classList.add('border-b-4', 'border-b-[#F5D05E]');
            }

            // Menambahkan event listener untuk setiap tab
            document.getElementById('artikel').addEventListener('click', function() {
                switchTab('artikel');
            });

            document.getElementById('news').addEventListener('click', function() {
                switchTab('news');
            });

            document.getElementById('mini-blog').addEventListener('click', function() {
                switchTab('mini-blog');
            });
        });
    </script>
@endsection
