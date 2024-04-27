<div>
    <div class="flex flex-col">
        <img src="/images/artikel.png" alt="artikel" class="h-full w-full object-cover">
        <div class="flex">
            <nav class="flex flex-row w-full h-20 items-center justify-between px-96 bg-[#0D5568]">
                <div
                    class="{{ $category->slug === 'article' ? 'border-b-4 border-b-[#F5D05E]' : 'border-none' }} text-2xl font-bold w-auto h-full p-6 text-white">
                    <button type="button" wire:click="setCategory('artikel')" class="">Artikel</button>
                </div>
                <div
                    class="{{ $category->slug === 'news' ? 'border-b-4 border-b-[#F5D05E]' : 'border-none' }} text-2xl font-bold w-auto h-full p-6 text-white">
                    <button type="button" wire:click="setCategory('berita')" class="">News</button>
                </div>
                <div
                    class="{{ $category->slug === 'mini-blog' ? 'border-b-4 border-b-[#F5D05E]' : 'border-none' }} text-2xl font-bold w-auto h-full p-6 text-white">
                    <button type="button" wire:click="setCategory('mini-blog')" class="">Mini Blog</button>
                </div>
            </nav>
        </div>
    </div>


    {{-- Carousel Start --}}
    <section class="bg-white p-10">
        <div class="relative w-full h-[70vh] bg-[#0D5568] overflow-hidden rounded-lg">
            <x-carousel :posts="$this->posts" />
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
                        <p class="font-medium text-base text-justify text-white">Edukasi tentang penelitian
                            pengkajian,
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
                        <p class="font-medium text-base text-justify text-white">Edukasi tentang penelitian
                            pengkajian,
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
                        <p class="font-medium text-base text-justify text-white">Edukasi tentang penelitian
                            pengkajian,
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
                @foreach ($this->posts as $post)
                    <x-posts.post-card :post="$post" />
                @endforeach
            </div>
            <div class="flex justify-center">
                <div
                    class="flex flex-row items-center justify-center rounded-xl bg-[#FFDF4E] w-1/4 h-1/6 gap-2 transition-transform duration-300 hover:scale-110">
                    <a href="{{ route('posts.detail', ['category' => $post->category]) }}"
                        class="p-3 text-lg font-bold">
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
