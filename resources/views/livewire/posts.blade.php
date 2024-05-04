<div class="flex flex-col w-full mx-auto">
    <div class="flex flex-col w-full">
        <img src="/images/artikel.png" alt="artikel" class="h-full w-full object-contain">
        <div class="flex w-full">
            <nav class="flex flex-row w-full h-20 items-center justify-center bg-[#0D5568]">
                <div
                    class="{{ $category->slug === 'artikel' ? 'border-b-4 border-b-[#F5D05E]' : 'border-none' }} text-2xl font-bold w-auto h-full p-6 text-white">
                    <button type="button" wire:click="setCategory('artikel')" class="">Artikel</button>
                </div>
                <div
                    class="{{ $category->slug === 'berita' ? 'border-b-4 border-b-[#F5D05E]' : 'border-none' }} text-2xl font-bold w-auto h-full p-6 text-white">
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
    @if ($category->slug === 'artikel' || $category->slug === 'mini-blog')
        <section class="bg-white">
            <div class="p-10 flex flex-col gap-5 w-full">
                <div class="">
                    <h1 class="border-b-4 border-b-[#FFDF4E] text-4xl w-full pb-2">Category</h1>
                </div>
                <div
                    class="p-10 w-fit md:w-auto h-fit bg-[#0D5568] rounded-lg flex flex-col md:flex-row md:items-start md:justify-start items-center gap-5 md:gap-7 lg:gap-10">
                    @if ($category->slug === 'mini-blog')
                        <div
                            class="flex items-center justify-center w-36 h-36 lg:w-52 lg:h-52 xl:w-72 xl:h-72 rounded-lg shadow bg-slate-400">
                            <div class="p-2 lg:p-5 relative flex flex-col items-center h-full gap-2 lg:gap-10 bg-cover bg-center"
                                style="background-image: url('/images/sub-category/fact-research.png');">
                                <div
                                    class="w-28 h-7 lg:w-56 lg:h-14 border border-[#FFDF4E] flex items-center justify-center gap-1 lg:gap-4 rounded-lg lg:rounded-2xl">
                                    <img src="/images/sub-category/category-icon.svg" alt="cat icon"
                                        class="w-4 lg:w-6 aspect-square">
                                    <a wire:key="#"
                                        href="{{ route('posts.detail', ['category' => 'fact-in-research']) }}"
                                        class="text-center text-xs lg:text-sm font-normal lg:font-bold text-[#FFDF4E]">FACT
                                        IN
                                        RESEARCH</a>
                                </div>
                                <p class="font-medium text-xs lg:text-base text-justify text-white">Fakta menarik
                                    seputar
                                    penelitian</p>
                            </div>
                        </div>
                        <div
                            class="flex items-center justify-center w-36 h-36 lg:w-52 lg:h-52 xl:w-72 xl:h-72 rounded-lg shadow bg-slate-400">
                            <div class="p-2 lg:p-5 relative flex flex-col items-center h-full gap-2 lg:gap-10 bg-cover bg-center"
                                style="background-image: url('/images/sub-category/isr-edu.png');">
                                <div
                                    class="w-28 h-7 lg:w-56 lg:h-14 border border-[#FFDF4E] flex items-center justify-center gap-1 lg:gap-4 rounded-lg lg:rounded-2xl">
                                    <img src="/images/sub-category/category-icon.svg" alt="cat icon"
                                        class="w-4 lg:w-6 aspect-square">
                                    <a wire:key="#" href="{{ route('posts.detail', ['category' => 'isr-edu']) }}"
                                        class="text-center text-xs lg:text-sm font-normal lg:font-bold text-[#FFDF4E]">ISR
                                        EDU</a>
                                </div>
                                <p class="font-medium text-xs lg:text-base text-justify text-white">Edukasi tentang
                                    penelitian
                                    pengkajian,
                                    SDGs, dan jenis penelitian</p>
                            </div>
                        </div>
                    @endif
                    
                    @if ($category->slug === 'artikel')
                        <div
                            class="flex items-center justify-center w-36 h-36 lg:w-52 lg:h-52 xl:w-60 xl:h-60 rounded-lg shadow bg-slate-400">
                            <div class="p-2 lg:p-5 relative flex flex-col items-center h-full gap-2 lg:gap-10 bg-cover bg-center"
                                style="background-image: url('/images/sub-category/isr-journey.png');">
                                <div
                                    class="w-28 h-7 lg:w-56 lg:h-14 border border-[#FFDF4E] flex items-center justify-center gap-1 lg:gap-4 rounded-lg lg:rounded-2xl">
                                    <img src="/images/sub-category/category-icon.svg" alt="cat icon"
                                        class="w-4 lg:w-6 aspect-square">
                                    <a wire:key="#" href="{{ route('posts.detail', ['category' => 'isr-journey']) }}"
                                        class="text-center text-xs lg:text-sm font-normal lg:font-bold text-[#FFDF4E]">ISR
                                        JOURNEY</a>
                                </div>
                                <p class="font-medium text-xs lg:text-base text-justify text-white">Liputan dan berita
                                    tentang program kerja yang telah dilaksanakan UKM ISR UPNVY</p>
                            </div>
                        </div>
                        <div
                            class="flex items-center justify-center w-36 h-36 lg:w-52 lg:h-52 xl:w-60 xl:h-60 rounded-lg shadow bg-slate-400">
                            <div class="p-2 lg:p-5 relative flex flex-col items-center h-full gap-2 lg:gap-10 bg-cover bg-center"
                                style="background-image: url('/images/sub-category/opini-refleksi.png');">
                                <div
                                    class="w-28 h-7 lg:w-56 lg:h-14 border border-[#FFDF4E] flex items-center justify-center gap-1 lg:gap-4 rounded-lg lg:rounded-2xl">
                                    <img src="/images/sub-category/category-icon.svg" alt="cat icon"
                                        class="w-4 lg:w-6 aspect-square">
                                    <a wire:key="#" href="{{ route('posts.detail', ['category' => 'isr-journey']) }}"
                                        class="text-center text-xs lg:text-sm font-normal lg:font-bold text-[#FFDF4E]">OPINI
                                        &
                                        REFLEKSI</a>
                                </div>
                                <p class="font-medium text-xs lg:text-base text-justify text-white">Membahas isu-isu
                                    tertentu</p>
                            </div>
                        </div>
                        <div
                            class="flex items-center justify-center w-36 h-36 lg:w-52 lg:h-52 xl:w-60 xl:h-60 rounded-lg shadow bg-slate-400">
                            <div class="p-2 lg:p-5 relative flex flex-col items-center h-full gap-2 lg:gap-10 bg-cover bg-center"
                                style="background-image: url('/images/sub-category/tips-trick.png');">
                                <div
                                    class="w-28 h-7 lg:w-56 lg:h-14 border border-[#FFDF4E] flex items-center justify-center gap-1 lg:gap-4 rounded-lg lg:rounded-2xl">
                                    <img src="/images/sub-category/category-icon.svg" alt="cat icon"
                                        class="w-4 lg:w-6 aspect-square">
                                    <a wire:key="#" href="{{ route('posts.detail', ['category' => 'isr-journey']) }}"
                                        class="text-center text-xs lg:text-sm font-normal lg:font-bold text-[#FFDF4E]">TIPS
                                        &
                                        TRICK</a>
                                </div>
                                <p class="font-medium text-xs lg:text-base text-justify text-white">Berisi tips & trick
                                    terkait
                                    topik keilmiahan dan wawancara inspiratif tokoh terkait</p>
                            </div>
                        </div>
                        <div
                            class="flex items-center justify-center w-36 h-36 lg:w-52 lg:h-52 xl:w-60 xl:h-60 rounded-lg shadow bg-slate-400">
                            <div class="p-2 lg:p-5 relative flex flex-col items-center h-full gap-2 lg:gap-10 bg-cover bg-center"
                                style="background-image: url('/images/sub-category/prestasi-isr.png');">
                                <div
                                    class="w-28 h-7 lg:w-56 lg:h-14 border border-[#FFDF4E] flex items-center justify-center gap-1 lg:gap-4 rounded-lg lg:rounded-2xl">
                                    <img src="/images/sub-category/category-icon.svg" alt="cat icon"
                                        class="w-4 lg:w-6 aspect-square">
                                    <a wire:key="#" href="{{ route('posts.detail', ['category' => 'isr-journey']) }}"
                                        class="text-center text-xs lg:text-sm font-normal lg:font-bold text-[#FFDF4E]">PRESTASI
                                        ISR</a>
                                </div>
                                <p class="font-medium text-xs lg:text-base text-justify text-white">Berita tentang
                                    prestasi anggota
                                    UKM ISR UPNVY</p>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </section>
    @endif
    @if ($category->slug === 'news')
        <section>

        </section>
    @endif
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
            <div class="flex items-center justify-center">
                <div
                    class="flex flex-row items-center justify-center rounded-xl bg-[#FFDF4E] w-60 h-10 gap-2 transition-transform duration-300 hover:scale-110">
                    @if ($category->slug === 'artikel' || $category->slug === 'mini-blog')
                        <a href="{{ route('posts.detail', ['category' => $post->category]) }}"
                            class="p-3 text-sm md:text-base font-bold">
                            LIHAT SELENGKAPNYA
                        </a>
                        <img src="/images/black-arrow.svg" alt="arrow" class="w-4 lg:w-5 aspect-square" />
                    @endif
                    @if ($category->slug === 'news')
                    <a href="{{ route('posts.detail', ['category' => 'news']) }}"
                        class="p-3 text-sm md:text-base font-bold">
                        LIHAT SELENGKAPNYA
                    </a>
                    <img src="/images/black-arrow.svg" alt="arrow" class="w-4 lg:w-5 aspect-square" />
                    @endif
                </div>
            </div>
    </section>
    {{-- Posts Terbaru End --}}
</div>
