<div id="navbar-hamburger-mobile"
    class="hidden inset-x-0 top-16 w-full h-full text-lg text-white z-50 fixed bg-[#0D5568]">
    {{-- Menu --}}
    <div class="flex flex-col overflow-y-scroll w-full h-full border-r border-white">
        {{-- Menu Tentang ISR Start --}}
        <a data-menu id="isr-mobile" href="#"
            class="flex w-full hover:text-[#F5D05E] items-center justify-between p-4">
            <div class="flex gap-2 items-center">
                <img src="/images/navbar/isr.svg" alt="isr" class="w-12 aspect-square">
                <div class="flex flex-col justify-center items-start">
                    <h1 class="font-bold">Tentang ISR</h1>
                    <h2 class="text-sm">Kenal lebih dekat dengan ISR</h2>
                </div>
            </div>
            <img src="/images/navbar/arrow.svg" alt="arrow" class="w-6 aspect-square">
        </a>
        <div data-menu data-menu-target="isr-mobile" id="submenu-isr-mobile"
            class="hidden flex-col gap-2 w-full py-2 px-6">
            @foreach ($this->organizationals as $organizational)
                <a wire:key="{{ $organizational->id }}" href="{{ route('abouts.show', $organizational->slug) }}"
                    class="text-sm flex w-full hover:text-[#F5D05E] px-5 py-1">{{ $organizational->title }}</a>
            @endforeach
        </div>
        {{-- Menu Tentang ISR End --}}

        {{-- Menu Pojok Ilmiah Start --}}
        <a data-menu id="ilmiah-mobile" href="#"
            class="flex w-full hover:text-[#F5D05E] items-center justify-between p-4">
            <div class="flex gap-2 items-center">
                <img src="/images/navbar/ilmiah.svg" alt="ilmiah" class="w-12 aspect-square">
                <div class="flex flex-col justify-center items-start">
                    <h1 class="font-bold">Pojok Ilmiah</h1>
                    <h2 class="text-sm">Baca artikel, berita, dan mini blog</h2>
                </div>
            </div>
            <img src="/images/navbar/arrow.svg" alt="arrow" class="w-6 aspect-square">
        </a>
        <div data-menu data-menu-target="ilmiah-mobile" class="hidden flex-col gap-2 w-80 h-full py-4 px-6">
            <div class="flex flex-col">
                @foreach ($this->posts as $post)
                    <div id="{{ $post->slug }}" data-menu data-submenu="{{ $post->slug }}"
                        wire:key="{{ $post->id }}" class="flex felx-row justify-between pr-2">
                        <a href="{{ route('posts.detail', $post->slug) }}"
                            class="text-sm flex w-full hover:text-[#F5D05E] items-center justify-between p-4">{{ $post->name }}</a>
                        <img src="/images/navbar/arrow.svg" alt="arrow" class="aspect-square w-5">
                    </div>
                @endforeach
            </div>
        </div>
        <div data-menu data-menu-target="artikel" class="flex-col w-80">
            @foreach ($this->subPosts('artikel') as $subpost)
                <a wire:key="{{ $subpost->id }}" href="{{ route('posts.detail', ['category' => $subpost->slug]) }}"
                    class="text-base flex w-full hover:text-[#F5D05E] p-4">{{ $subpost->name }}</a>
            @endforeach
        </div>
        <div data-menu data-menu-target="mini-blog" class="flex-col overflow-y-scroll w-80">
            @foreach ($this->subPosts('mini-blog') as $subpost)
                <a wire:key="{{ $subpost->id }}" href="{{ route('posts.detail', ['category' => $subpost->slug]) }}"
                    class="text-base flex w-full hover:text-[#F5D05E] p-4">{{ $subpost->name }}</a>
            @endforeach
        </div>
        {{-- Menu Pojok Ilmiah End --}}

        {{-- Menu Departemen Start --}}
        <a data-menu id="departemen-mobile" href="#"
            class="flex w-full hover:text-[#F5D05E] items-center justify-between p-4">
            <div class="flex gap-2 items-center">
                <img src="/images/navbar/departemen.svg" alt="departemen" class="w-12 aspect-square">
                <div class="flex flex-col justify-center">
                    <h1 class="font-bold">Departemen</h1>
                    <h2 class="text-sm">Ragam departemen di ISR</h2>
                </div>
            </div>
            <img src="/images/navbar/arrow.svg" alt="arrow" class="w-6 aspect-square">
        </a>
        <div data-menu data-menu-target="departemen-mobile" id="submenu-departemen"
            class="hidden flex-col w-full py-2 px-6">
            @foreach ($this->departments as $department)
                <a wire:key="{{ $department->id }}" href="{{ route('departments.show', $department->slug) }}"
                    class="text-sm flex w-full hover:text-[#F5D05E] px-5 py-1">{{ $department->title }}
                    </>
            @endforeach
        </div>
        {{-- Menu Departemen End --}}

        {{-- Menu Rekrutmen Start --}}
        <a data-menu id="rekrutmen-mobile" href="#"
            class="flex w-full hover:text-[#F5D05E] items-center justify-between p-4">
            <div class="flex gap-2 items-center">
                <img src="/images/navbar/rekrutmen.svg" alt="rekrutmen" class="w-12 aspect-square">
                <div class="flex flex-col justify-center">
                    <h1 class="font-bold">Rekrutmen</h1>
                    <h2 class="text-sm">Ragam seleksi keanggotaan ISR</h2>
                </div>
            </div>
            <img src="/images/navbar/arrow.svg" alt="arrow" class="w-6 aspect-square">
        </a>
        <div data-menu data-menu-target="rekrutmen-mobile" id="submenu-rekrutmen"
            class="hidden flex-col w-full py-2 px-6">
            @foreach ($this->recruitments as $recruitment)
                <div id="{{ $recruitment->slug }}" data-menu data-submenu="{{ $recruitment->slug }}"
                    wire:key="{{ $recruitment->id }}" class="flex flex-row pr-2">
                    <a href="{{ route('recruitments.index', $recruitment->slug) }}"
                        class="text-white hover:text-[#F5D05E] text-xs block px-5 py-1">{{ $recruitment->name }}</a>
                </div>
            @endforeach
        </div>
        {{-- Menu Rekrutmen End --}}

        {{-- Menu Prestasi Start --}}
        <a data-menu id="prestasi-mobile" href="#"
            class="flex w-full hover:text-[#F5D05E] items-center justify-between p-4">
            <div class="flex gap-2 items-center">
                <img src="/images/navbar/prestasi.svg" alt="prestasi" class="w-12 aspect-square">
                <div class="flex flex-col justify-center">
                    <p class="font-bold">Prestasi</p>
                    <p class="text-sm">Prestasi yang dicapai oleh tim ISR</p>
                </div>
            </div>
            <img src="/images/navbar/arrow.svg" alt="arrow" class="w-6 aspect-square">
        </a>
        <div data-menu data-menu-target="prestasi-mobile" id="submenu-prestasi"
            class="hidden flex-col w-full py-2 px-6">
            @foreach ($this->achievements as $year => $achievementsOfYear)
                <a href="{{ route('achievements.index', ['year' => $year]) }}"
                    class="text-white hover:text-[#F5D05E] text-xs block px-5 py-1">Tahun {{ $year }}</a>
            @endforeach
        </div>
        {{-- Menu Prestasi End --}}

        {{-- Menu Kompetisi Start --}}
        <a data-menu id="kompetisi-mobile" class="flex w-full hover:text-[#F5D05E] items-center justify-between p-4">
            <div class="flex gap-2 items-center">
                <img src="/images/navbar/kompetisi.svg" alt="kompetisi" class="w-12 aspect-square">
                <div class="flex flex-col justify-center">
                    <p class="font-bold">Kompetisi</p>
                    <p class="text-sm">Pendaftaran lomba dan kompetisi</p>
                </div>
            </div>
            <img src="/images/navbar/arrow.svg" alt="arrow" class="w-6 aspect-square">
        </a>
        <div data-menu data-menu-target="kompetisi-mobile" id="submenu-kompetisi"
            class="hidden flex-col w-full py-2 px-6">
            <div class="flex flex-col">
                @foreach ($this->competitions as $competition)
                    <div class="flex felx-row justify-between pr-2">
                        <a wire:key="{{ $competition->id }}" data-submenu="{{ $competition->slug }}"
                            href="{{ route('competitions.index', $competition->slug) }}"
                            class="text-white hover:text-[#F5D05E] text-xs block px-5 py-1">{{ $competition->name }}</a>
                        <img src="/images/navbar/arrow.svg" alt="arrow">
                    </div>
                @endforeach
            </div>
        </div>
        {{-- Menu Kompetisi End --}}

        {{-- Menu Merchandise Start --}}
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
        {{-- Menu Merchandise End --}}

        {{-- Menu Download Start --}}
        <div class="flex w-full hover:text-[#F5D05E] items-center justify-between p-4">
            <a data-menu id="download-mobile" href="#" class="flex gap-2 items-center">
                <img src="/images/navbar/download.svg" alt="download" class="w-12 aspect-square">
                <div class="flex flex-col justify-center">
                    <p class="font-bold">Download</p>
                    <p class="text-sm">Asset ISR dan dokumen SOP</p>
                </div>
            </a>
            <img src="/images/navbar/arrow.svg" alt="arrow" class="w-6 aspect-square">
        </div>
        <div data-menu data-menu-target="download-mobile" id="submenu-download"
            class="hidden flex-col w-80 h-full border-r border-white py-4">
            <div class="flex flex-col">
                @foreach ($this->downloads as $download)
                    <a wire:key="{{ $download->id }}"
                        href="{{ route('downloads.index', ['category' => $download->slug]) }}"
                        class="text-white hover:text-[#F5D05E] text-xs block px-4 py-3">{{ $download->name }}</a>
                @endforeach
            </div>
        </div>
        {{-- Menu Download End --}}
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

{{-- <script>
    function toggleArrowRotation(menuId) {
        var menu = document.getElementById(menuId);
        menu.addEventListener("click", function() {
            var arrowIcon = menu.querySelector("#arrow-icon");
            if (arrowIcon.style.transform === "" || arrowIcon.style.transform === "rotate(90deg)") {
                arrowIcon.style.transform = "rotate(0deg)";
            } else {
                arrowIcon.style.transform = "rotate(90deg)";
            }
        });
    }

    toggleArrowRotation("isr-mobile");
    toggleArrowRotation("departemen-mobile");
</script> --}}
