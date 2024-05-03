<div id="navbar-hamburger-mobile"
    class="hidden inset-x-0 top-16 w-full h-full text-lg text-white z-50 fixed bg-[#0D5568]">
    {{-- Menu --}}
    <div class="flex flex-col overflow-y-scroll w-full h-full border-r border-white">
        {{-- Menu ISR start --}}
        <a data-menu id="isr-mobile" href="#" class="flex w-full hover:text-[#F5D05E] items-center justify-between p-4">
            <div class="flex gap-2 items-center">
                <img src="/images/navbar/isr.svg" alt="isr" class="w-12 aspect-square">
                <div class="flex flex-col justify-center items-start">
                    <h1 class="font-bold">Tentang kamu</h1>
                    <h2 class="text-sm">Kenal lebih dekat dengan ISR</h2>
                </div>
            </div>
            <img src="/images/navbar/arrow.svg" alt="arrow" class="w-6 aspect-square">
        </a>
        <div data-menu data-menu-target="isr-mobile" id="submenu-isr-mobile"
            class="hidden flex-col gap-2 w-80 h-full border-r border-white py-4 px-6">
            <a href="#" class="text-base flex w-full items-center justify-between p-4">Submenu 1</a>
            <a href="#" class="text-base flex w-full items-center justify-between p-4">Submenu 2</a>
            <a href="#" class="text-base flex w-full items-center justify-between p-4">Submenu 3</a>
            @foreach ($this->organizationals as $organizational)
                <a wire:key="{{ $organizational->id }}" href="{{ route('abouts.show', $organizational->slug) }}"
                    class="text-base flex w-full hover:text-[#F5D05E] items-center justify-between p-4">{{ $organizational->title }}</a>
            @endforeach
        </div>
        {{-- Menu ISR end --}}

        <a data-menu id="ilmiah-mobile" href="#" class="flex w-full hover:text-[#F5D05E] items-center justify-between p-4">
            <div class="flex gap-2 items-center">
                <img src="/images/navbar/ilmiah.svg" alt="ilmiah" class="w-12 aspect-square">
                <div class="flex flex-col justify-center items-start">
                    <h1 class="font-bold">Pojok Ilmiah</h1>
                    <h2 class="text-sm">Baca artikel, berita, dan mini blog</h2>
                </div>
            </div>
            <img src="/images/navbar/arrow.svg" alt="arrow" class="w-6 aspect-square">
        </a>
        <div data-menu data-menu-target="ilmiah-mobile"
            class="hidden flex-col gap-2 w-80 h-full border-r border-white py-4 px-6">
            <div class="flex flex-col">
                @foreach ($this->posts as $post)
                    <div id="{{ $post->slug }}" data-menu data-submenu="{{ $post->slug }}"
                        wire:key="{{ $post->id }}" class="flex felx-row justify-between pr-2">
                        <a href="{{ route('posts.detail', $post->slug) }}"
                            class="text-white hover:text-[#F5D05E] text-xs block px-4 py-3">{{ $post->name }}</a>
                        <img src="/images/navbar/arrow.svg" alt="arrow" class="aspect-square w-5">
                    </div>
                @endforeach
            </div>
        </div>
        <div data-menu data-menu-target="artikel" class="hidden flex-col w-80">
            @foreach ($this->subPosts('artikel') as $subpost)
                <a wire:key="{{ $subpost->id }}" href="{{ route('posts.detail', ['category' => $subpost->slug]) }}"
                    class="text-white text-xs px-4 py-3">{{ $subpost->name }}</a>
            @endforeach
        </div>
        <div data-menu data-menu-target="mini-blog" class="hidden flex-col overflow-y-scroll w-80">
            @foreach ($this->subPosts('mini-blog') as $subpost)
                <a wire:key="{{ $subpost->id }}" href="{{ route('posts.detail', ['category' => $subpost->slug]) }}"
                    class="text-white text-xs px-4 py-3">{{ $subpost->name }}</a>
            @endforeach
        </div>

        <a data-menu id="departemen" href="#" class="flex w-full hover:text-[#F5D05E] items-center justify-between p-4">
            <div class="flex gap-2 items-center">
                <img src="/images/navbar/departemen.svg" alt="departemen" class="w-12 aspect-square">
                <div class="flex flex-col justify-center">
                    <h1 class="font-bold">Departemen</h1>
                    <h2 class="text-sm">Ragam departemen di ISR</h2>
                </div>
            </div>
            <img src="/images/navbar/arrow.svg" alt="arrow" class="w-6 aspect-square">
        </a>
        <div data-menu data-menu-target="departemen" id="submenu-departemen"
            class="hidden flex-col w-80 h-full border-r border-white py-4">
            @foreach ($this->departments as $department)
                <a wire:key="{{ $department->id }}" href="{{ route('departments.show', $department->slug) }}"
                    class="text-white hover:text-[#F5D05E] text-xs block px-4 py-3">{{ $department->title }}
                    </>
            @endforeach
        </div>

        <a data-menu id="rekrutmen" href="#" class="flex w-full hover:text-[#F5D05E] items-center justify-between p-4">
            <div class="flex gap-2 items-center">
                <img src="/images/navbar/rekrutmen.svg" alt="rekrutmen" class="w-12 aspect-square">
                <div class="flex flex-col justify-center">
                    <h1 class="font-bold">Rekrutmen</h1>
                    <h2 class="text-sm">Ragam seleksi keanggotaan ISR</h2>
                </div>
            </div>
            <img src="/images/navbar/arrow.svg" alt="arrow" class="w-6 aspect-square">
        </a>
        <div data-menu data-menu-target="rekrutmen" id="submenu-rekrutmen"
            class="hidden flex-col w-80 h-full border-r border-white">
            @foreach ($this->recruitments as $recruitment)
                <a wire:key="{{ $recruitment->id }}" href="{{ route('recruitments.show', $recruitment->name) }}"
                    class="text-white hover:text-[#F5D05E] text-xs block px-4 py-3">{{ $recruitment->name }}</a>
            @endforeach
        </div>

        <a data-menu id="prestasi" href="#" class="flex w-full hover:text-[#F5D05E] items-center justify-between p-4">
            <div class="flex gap-2 items-center">
                <img src="/images/navbar/prestasi.svg" alt="prestasi" class="w-12 aspect-square">
                <div class="flex flex-col justify-center">
                    <p class="font-bold">Prestasi</p>
                    <p class="text-sm">Prestasi yang dicapai oleh tim ISR</p>
                </div>
            </div>
            <img src="/images/navbar/arrow.svg" alt="arrow" class="w-6 aspect-square">
        </a>
        <div data-menu data-menu-target="prestasi" id="submenu-prestasi" class="hidden top-full left-0 h-full">
            <a href="#" class="text-white text-xs block px-4 py-3">Tahun 2023</a>
            <a href="#" class="text-white text-xs block px-4 py-3">Tahun 2024</a>
            <a href="#" class="text-white text-xs block px-4 py-3">Tahun 2025</a>
        </div>

        <a data-menu id="kompetisi" class="flex w-full hover:text-[#F5D05E] items-center justify-between p-4">
            <div class="flex gap-2 items-center">
                <img src="/images/navbar/kompetisi.svg" alt="kompetisi" class="w-12 aspect-square">
                <div class="flex flex-col justify-center">
                    <p class="font-bold">Kompetisi</p>
                    <p class="text-sm">Pendaftaran lomba dan kompetisi</p>
                </div>
            </div>
            <img src="/images/navbar/arrow.svg" alt="arrow" class="w-6 aspect-square">
        </a>
        <div data-menu data-menu-target="kompetisi" id="submenu-kompetisi" class="hidden top-full left-0 h-full">
            <div class="flex flex-col">
                @foreach ($this->competitions as $competition)
                    <div class="flex felx-row justify-between pr-2">
                        <a wire:key="{{ $competition->id }}" data-submenu="{{ $competition->slug }}"
                            href="{{ route('competitions.index', $competition->slug) }}"
                            class="text-white hover:text-[#F5D05E] text-xs block px-4 py-3">{{ $competition->name }}</a>
                        <img src="/images/navbar/arrow.svg" alt="arrow">
                    </div>
                @endforeach
            </div>
        </div>

        <a data-menu id="market" href="{{ route('merchandise.index') }}"
            class="flex w-full hover:text-[#F5D05E] items-center justify-between p-4">
            <div class="flex gap-2 items-center">
                <img src="/images/navbar/market.svg" alt="market" class="w-12 aspect-square">
                <div class="flex flex-col justify-center">
                    <p class="font-bold">Market</p>
                    <p class="text-sm">Beragam Merchandise dari ISR UPN</p>
                </div>
            </div>
        </a>

        <div class="flex w-full hover:text-[#F5D05E] items-center justify-between p-4">
            <a data-menu id="download" href="#" class="flex gap-2 items-center">
                {{-- <a data-menu id="download" href="{{ route('downloads.index') }}" class="flex gap-2 items-center"> --}}
                <img src="/images/navbar/download.svg" alt="download" class="w-12 aspect-square">
                <div class="flex flex-col justify-center">
                    <p class="font-bold">Download</p>
                    <p class="text-sm">Asset ISR dan dokumen SOP</p>
                </div>
            </a>
            <img src="/images/navbar/arrow.svg" alt="arrow" class="w-6 aspect-square">
        </div>
        <div data-menu data-menu-target="download" id="submenu-download" class="hidden top-full left-0 h-full">
            <div class="flex flex-col">
                @foreach ($this->downloads as $download)
                    <a wire:key="{{ $download->id }}" href="{{ route('downloads.show', ['category' => $download->slug, 'download' => $download->slug]) }}"
                        class="text-white hover:text-[#F5D05E] text-xs block px-4 py-3">{{ $download->name }}</a>
                @endforeach
            </div>
        </div>
    </div>
</div>

<script>
    // Hamburger Menu Navbar
    // document.addEventListener('DOMContentLoaded', function() {
    //     var imgElements = document.querySelectorAll('img');

    //     imgElements.forEach(function(imgElement) {
    //         imgElement.addEventListener("click", function() {
    //             if (imgElement.getAttribute("src") === "/images/arrow-down.svg") {
    //                 imgElement.setAttribute("src", "/images/arrow.svg");
    //             } else {
    //                 imgElement.setAttribute("src", "/images/arrow-down.svg");
    //             }
    //         });
    //     });


    // });
</script>
