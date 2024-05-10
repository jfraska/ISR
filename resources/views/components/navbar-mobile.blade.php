<div id="navbar-hamburger-mobile"
    class="hidden inset-x-0 top-16 w-full h-full text-lg text-white z-50 fixed bg-[#0D5568]">
    {{-- Menu --}}
    <div class="flex flex-col overflow-y-scroll w-full h-full border-r border-white">
        {{-- Menu Tentang ISR Start --}}
        <div id="accordion-nested-parent" data-accordion="collapse" data-active-classes="bg-[#0D5568] text-white"
            data-inactive-classes="bg-[#0D5568] text-white">
            <h2 id="accordion-collapse-heading-1">
                <button type="button"
                    class="flex items-center justify-between w-full font-medium rtl:text-right py-3 pr-5 gap-3"
                    data-accordion-target="#accordion-collapse-body-1" aria-expanded="false"
                    aria-controls="accordion-collapse-body-1">
                    <span class="flex items-center">
                        <a data-menu id="isr-mobile" href="#"
                            class="flex w-full hover:text-[#F5D05E] items-center justify-between pt-4 px-4">
                            <div class="flex gap-2 items-center">
                                <img src="/images/navbar/isr.svg" alt="isr" class="w-12 aspect-square">
                                <div class="flex flex-col justify-center items-start">
                                    <h1 class="font-bold">Tentang ISR</h1>
                                    <h2 class="text-sm">Kenal lebih dekat dengan ISR</h2>
                                </div>
                            </div>
                        </a>
                    </span>
                    <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 5 5 1 1 5" />
                    </svg>
                </button>
            </h2>
            <div id="accordion-collapse-body-1" class="hidden" aria-labelledby="accordion-collapse-heading-1">
                <div class="px-5">
                    <div class="flex-col gap-4 w-full px-6">
                        @foreach ($this->organizationals as $organizational)
                            @if ($organizational->slug !== 'contact' && $organizational->slug !== 'general')
                                <a wire:key="{{ $organizational->id }}"
                                    href="{{ route('abouts.show', $organizational->slug) }}"
                                    class="text-base flex w-full hover:text-[#F5D05E] items-center justify-between p-3">{{ $organizational->title }}</a>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
            {{-- Menu Tentang ISR End --}}

            {{-- Menu Pojok Ilmiah Start --}}
            <h2 id="accordion-collapse-heading-2">
                <button type="button"
                    class="flex items-center justify-between w-full font-medium rtl:text-right py-3 pr-5 gap-3"
                    data-accordion-target="#accordion-collapse-body-2" aria-expanded="false"
                    aria-controls="accordion-collapse-body-2">
                    <span class="flex items-center">
                        <a data-menu id="isr-mobile" href="#"
                            class="flex w-full hover:text-[#F5D05E] items-center justify-between pt-4 px-4">
                            <div class="flex gap-2 items-center">
                                <img src="/images/navbar/ilmiah.svg" alt="ilmiah" class="w-12 aspect-square">
                                <div class="flex flex-col justify-center items-start">
                                    <h1 class="font-bold">Pojok Ilmiah</h1>
                                    <h2 class="text-sm">Baca artikel, berita, dan mini blog</h2>
                                </div>
                            </div>
                        </a>
                    </span>
                    <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 5 5 1 1 5" />
                    </svg>
                </button>
            </h2>
            <div id="accordion-collapse-body-2" class="hidden" aria-labelledby="accordion-collapse-heading-2">
                <div id="accordion-nested-collapse" data-accordion="collapse"
                    data-active-classes="bg-[#0D5568] text-white" data-inactive-classes="bg-[#0D5568] text-white">
                    @foreach ($this->posts as $index => $post)
                        <h2 id="accordion-nested-collapse-heading-{{ $index + 1 }}">
                            <button type="button" class="w-full"
                                data-accordion-target="#accordion-nested-collapse-body-{{ $index + 1 }}"
                                aria-expanded="false"
                                aria-controls="accordion-nested-collapse-body-{{ $index + 1 }}">
                                <a href="{{ $post->slug == 'berita' ? route('posts.detail', $post->slug) : '#' }}"
                                    class="flex w-full items-center justify-between pt-4 pl-16 pr-7">
                                    <div class="text-sm">{{ $post->name }}</div>
                                    @if ($post->slug !== 'berita')
                                        <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="M9 5 5 1 1 5" />
                                        </svg>
                                    @endif
                                </a>
                            </button>
                        </h2>
                        <div id="accordion-nested-collapse-body-{{ $index + 1 }}" class="hidden"
                            aria-labelledby="accordion-nested-collapse-heading-{{ $index + 1 }}">
                            <div class="px-10">
                                <div class="flex-col gap-4 w-full px-6">
                                    @if ($post->slug === 'artikel')
                                        @foreach ($this->subPosts('artikel') as $subpost)
                                            <a wire:key="{{ $subpost->id }}"
                                                href="{{ route('posts.detail', ['category' => $subpost->slug]) }}"
                                                class="text-xs flex w-full hover:text-[#F5D05E] p-4">{{ $subpost->name }}</a>
                                        @endforeach
                                    @endif
                                    @if ($post->slug === 'mini-blog')
                                        @foreach ($this->subPosts('mini-blog') as $subpost)
                                            <a wire:key="{{ $subpost->id }}"
                                                href="{{ route('posts.detail', ['category' => $subpost->slug]) }}"
                                                class="text-xs flex w-full hover:text-[#F5D05E] p-4">{{ $subpost->name }}</a>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        {{-- Menu Pojok Ilmiah End --}}

        {{-- Menu Departemen Start --}}
        <div id="accordion-color" data-accordion="collapse" data-active-classes="bg-[#0D5568] text-white"
            data-inactive-classes="bg-[#0D5568] text-white">
            <h2 id="accordion-open-heading-3">
                <button type="button"
                    class="flex items-center justify-between w-full font-medium rtl:text-right py-3 pr-5 gap-3"
                    data-accordion-target="#accordion-open-body-3" aria-expanded="false"
                    aria-controls="accordion-open-body-3">
                    <span class="flex items-center">
                        <a data-menu id="isr-mobile" href="#"
                            class="flex w-full hover:text-[#F5D05E] items-center justify-between pt-4 px-4">
                            <div class="flex gap-2 items-center">
                                <img src="/images/navbar/departemen.svg" alt="isr" class="w-12 aspect-square">
                                <div class="flex flex-col justify-center items-start">
                                    <h1 class="font-bold">Departemen</h1>
                                    <h2 class="text-sm">Ragam departemen di ISR</h2>
                                </div>
                            </div>
                        </a>
                    </span>
                    <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 5 5 1 1 5" />
                    </svg>
                </button>
            </h2>
            <div id="accordion-open-body-3" class="hidden" aria-labelledby="accordion-open-heading-3">
                <div class="px-5">
                    <div class="flex-col gap-4 w-full px-6">
                        @foreach ($this->departments as $department)
                            <a wire:key="{{ $department->id }}"
                                href="{{ route('departments.show', $department->slug) }}"
                                class="text-sm flex w-full hover:text-[#F5D05E] px-5 py-1">{{ $department->title }}
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
            {{-- Menu Departemen End --}}

            {{-- Menu Rekrutmen Start --}}
            <h2 id="accordion-open-heading-4">
                <button type="button"
                    class="flex items-center justify-between w-full font-medium rtl:text-right py-3 pr-5 gap-3"
                    data-accordion-target="#accordion-open-body-4" aria-expanded="false"
                    aria-controls="accordion-open-body-4">
                    <span class="flex items-center">
                        <a data-menu id="isr-mobile" href="#"
                            class="flex w-full hover:text-[#F5D05E] items-center justify-between pt-4 px-4">
                            <div class="flex gap-2 items-center">
                                <img src="/images/navbar/rekrutmen.svg" alt="isr" class="w-12 aspect-square">
                                <div class="flex flex-col justify-center items-start">
                                    <h1 class="font-bold">Rekrutmen</h1>
                                    <h2 class="text-sm">Ragam seleksi keanggotaan ISR</h2>
                                </div>
                            </div>
                        </a>
                    </span>
                    <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 5 5 1 1 5" />
                    </svg>
                </button>
            </h2>
            <div id="accordion-open-body-4" class="hidden" aria-labelledby="accordion-open-heading-4">
                <div class="px-5">
                    <div class="flex-col gap-4 w-full px-6">
                        @foreach ($this->recruitments as $recruitment)
                            <div id="{{ $recruitment->slug }}" data-menu data-submenu="{{ $recruitment->slug }}"
                                wire:key="{{ $recruitment->id }}" class="flex flex-row pr-2">
                                <a href="{{ route('recruitments.index', $recruitment->slug) }}"
                                    class="text-white hover:text-[#F5D05E] text-xs block px-5 py-1">{{ $recruitment->name }}</a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            {{-- Menu Rekrutmen End --}}

            {{-- Menu Prestasi Start --}}
            <h2 id="accordion-open-heading-5">
                <button type="button"
                    class="flex items-center justify-between w-full font-medium rtl:text-right py-3 pr-5 gap-3"
                    data-accordion-target="#accordion-open-body-5" aria-expanded="false"
                    aria-controls="accordion-open-body-5">
                    <span class="flex items-center">
                        <a data-menu id="isr-mobile" href="#"
                            class="flex w-full hover:text-[#F5D05E] items-center justify-between pt-4 px-4">
                            <div class="flex gap-2 items-center">
                                <img src="/images/navbar/prestasi.svg" alt="isr" class="w-12 aspect-square">
                                <div class="flex flex-col justify-center items-start">
                                    <p class="font-bold">Prestasi</p>
                                    <p class="text-sm">Prestasi yang dicapai oleh tim ISR</p>
                                </div>
                            </div>
                        </a>
                    </span>
                    <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 5 5 1 1 5" />
                    </svg>
                </button>
            </h2>
            <div id="accordion-open-body-5" class="hidden" aria-labelledby="accordion-open-heading-5">
                <div class="px-5">
                    <div class="flex-col gap-4 w-full px-6">
                        @foreach ($this->achievements as $year => $achievementsOfYear)
                            <a href="{{ route('achievements.index', ['year' => $year]) }}"
                                class="text-white hover:text-[#F5D05E] text-xs block px-5 py-1">Tahun
                                {{ $year }}</a>
                        @endforeach
                    </div>
                </div>
            </div>
            {{-- Menu Prestasi End --}}

            {{-- Menu Kompetisi Start --}}
            <h2 id="accordion-open-heading-6">
                <button type="button"
                    class="flex items-center justify-between w-full font-medium rtl:text-right py-3 pr-5 gap-3"
                    data-accordion-target="#accordion-open-body-6" aria-expanded="false"
                    aria-controls="accordion-open-body-6">
                    <span class="flex items-center">
                        <a data-menu id="isr-mobile" href="#"
                            class="flex w-full hover:text-[#F5D05E] items-center justify-between pt-4 px-4">
                            <div class="flex gap-2 items-center">
                                <img src="/images/navbar/prestasi.svg" alt="isr" class="w-12 aspect-square">
                                <div class="flex flex-col justify-center items-start">
                                    <p class="font-bold">Kompetisi</p>
                                    <p class="text-sm">Pendaftaran lomba dan kompetisi</p>
                                </div>
                            </div>
                        </a>
                    </span>
                    <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 5 5 1 1 5" />
                    </svg>
                </button>
            </h2>
            <div id="accordion-open-body-6" class="hidden" aria-labelledby="accordion-open-heading-6">
                <div class="px-5">
                    <div class="flex-col gap-4 w-full px-6">
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
            <h2 id="accordion-open-heading-1">
                <button type="button"
                    class="flex items-center justify-between w-full font-medium rtl:text-right py-3 pr-5 gap-3"
                    data-accordion-target="#accordion-open-body-1" aria-expanded="false"
                    aria-controls="accordion-open-body-1">
                    <span class="flex items-center">
                        <a data-menu id="isr-mobile" href="#"
                            class="flex w-full hover:text-[#F5D05E] items-center justify-between pt-4 px-4">
                            <div class="flex gap-2 items-center">
                                <img src="/images/navbar/prestasi.svg" alt="isr" class="w-12 aspect-square">
                                <div class="flex flex-col justify-center items-start">
                                    <p class="font-bold">Download</p>
                                    <p class="text-sm">Asset ISR dan dokumen SOP</p>
                                </div>
                            </div>
                        </a>
                    </span>
                    <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 5 5 1 1 5" />
                    </svg>
                </button>
            </h2>
            <div id="accordion-open-body-1" class="hidden" aria-labelledby="accordion-open-heading-1">
                <div class="px-5">
                    <div class="flex-col gap-4 w-full px-7">
                        @foreach ($this->downloads as $download)
                            <a wire:key="{{ $download->id }}"
                                href="{{ route('downloads.index', ['category' => $download->slug]) }}"
                                class="text-white hover:text-[#F5D05E] text-xs block px-4 py-3">{{ $download->name }}</a>
                        @endforeach
                    </div>
                </div>
            </div>
            {{-- Menu Download End --}}
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
