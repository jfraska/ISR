<div class="">
    <nav class="bg-transparent bg-gradient-to-b from-gray-700 to-transparent top-0 inset-x-0 z-50 fixed transition-all duration-200 ease-in-out"
        id="navbar">
        <div class="bg-transparent max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4"
            id="navbar-content">
            <div class="flex flex-wrap items-center">
                <button data-collapse-toggle="navbar-hamburger" type="button"
                    class="inline-flex w-10 aspect-square items-center justify-center p-2 text-white focus:outline-none"
                    aria-controls="navbar-hamburger" aria-expanded="false">
                    <svg class="h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 17 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M1 1h15M1 7h15M1 13h15" />
                    </svg>
                </button>
                <div class="flex flex-row items-center p-1 md:p-0">
                    <a href="{{ route('home') }}" class="ml-4 flex items-center space-x-3 rtl:space-x-reverse">
                        <a href="{{ route('home') }}" class="ml-4 flex items-center space-x-3 rtl:space-x-reverse">
                            <img src="/images/upn-blu-navbar-logo.png" class="h-12" alt="UPN BLU Logo" />
                        </a>
                        <a href="#" class="ml-2 flex items-center space-x-3 rtl:space-x-reverse">
                            <img src="/images/isr-navbar-logo.png" class="h-12" alt="ISR Logo" />
                        </a>
                        <a href="#" class="ml-2 flex items-center space-x-3 rtl:space-x-reverse">
                            <img src="/images/isr-navbar-logo2.png" class="h-12" alt="ISR Logo2" />
                        </a>
                </div>
            </div>
            <div class="hidden w-full md:block md:w-auto" id="navbar-default">
                <div
                    class="mt-4 flex flex-col items-center rounded-lg border border-gray-100 p-4 font-medium md:mt-0 md:flex-row md:space-x-8 md:border-0 md:p-0 rtl:space-x-reverse">
                    <div>
                        <a href="#" class="block px-0" aria-current="page">
                            <img src="/images/instagram.svg" class="h-5" alt="ISR instagram" />
                        </a>
                    </div>
                    <div>
                        <a href="#" class="block px-0" aria-current="page">
                            <img src="/images/twitter.svg" class="h-5" alt="ISR Twitter" />
                        </a>
                    </div>
                    <div>
                        <a href="#" class="block px-0" aria-current="page">
                            <img src="/images/youtube.svg" class="h-5" alt="ISR Youtube" />
                        </a>
                    </div>
                    <div>
                        <a href="#" class="ml-10 block" aria-current="page">
                            <img src="/images/search.svg" class="h-5" alt="Search" />
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <div id="navbar-hamburger"
        class="hidden inset-x-16 top-[80px] text-lg text-white z-50 fixed bg-[#0D5568] w-11/12 h-5/6">

        {{-- Menu --}}
        <div class="flex flex-col overflow-y-scroll w-80 h-full border-r border-white">
            <a data-menu id="isr" href="#"
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
            <a data-menu id="ilmiah" href="#"
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
            <a data-menu id="departemen" href="#"
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
            <a data-menu id="rekrutmen" href="#"
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
            <a data-menu id="prestasi" href="#"
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
            <a data-menu id="download" href="#"
                class="flex w-full hover:text-[#F5D05E] items-center justify-between p-4">
                <div class="flex gap-2 items-center">
                    <img src="/images/navbar/download.svg" alt="download" class="w-12 aspect-square">
                    <div class="flex flex-col justify-center">
                        <p class="font-bold">Download</p>
                        <p class="text-sm">Asset ISR dan dokumen SOP</p>
                    </div>
                </div>
                <img src="/images/navbar/arrow.svg" alt="arrow" class="w-6 aspect-square">
            </a>
        </div>

        {{-- Sub Menu --}}
        <div class="w-fit h-full">
            <div data-menu data-menu-target="isr" id="submenu-isr"
                class="hidden flex-col gap-2 overflow-y-scroll w-80 h-full border-r border-white py-4 px-6">
                <h1 class="font-bold mb-2">Tentang ISR</h1>
                @foreach ($this->organizationals as $organizational)
                    <a wire:key="{{ $organizational->id }}" href="{{ route('abouts.show', $organizational->slug) }}"
                        class="text-base flex w-full hover:text-[#F5D05E] items-center justify-between p-4">{{ $organizational->title }}</a>
                @endforeach
            </div>
            <div data-menu data-menu-target="ilmiah"
                class="hidden flex-col gap-2 overflow-y-scroll w-80 h-full border-r border-white py-4 px-6">
                <h1 class="font-bold mb-2">Pojok Ilmiah</h1>
                <a data-menu data-submenu="artikel" id="artikel" href="{{ route('posts.index') }}"
                    class="text-base flex w-full hover:text-[#F5D05E] items-center justify-between">Artikel</a>
                <a data-menu data-submenu="berita" id="berita" href="{{ route('posts.index') }}"
                    class="text-base flex w-full hover:text-[#F5D05E] items-center justify-between">Berita</a>
                <a href="{{ route('posts.index') }}"
                    class="text-base flex w-full hover:text-[#F5D05E] items-center justify-between">Mini Blog</a>
            </div>
            <div data-menu data-menu-target="departemen" id="submenu-departemen"
                class="hidden flex-col overflow-y-scroll w-80 h-full border-r border-white">
                <p class="text-sm text-white font-bold block px-4 py-2">Departemen</p>
                @foreach ($this->departments as $department)
                    <a wire:key="{{ $department->id }}" href="{{ route('departments.show', $department->slug) }}" <a
                        wire:key="{{ $department->id }}" href="{{ route('departments.show', $department->slug) }}"
                        class="text-white text-xs block px-4 py-3">{{ $department->title }}</a>
                @endforeach
            </div>
            <div data-menu data-menu-target="rekrutmen" id="submenu-rekrutmen"
                class="hidden flex-col overflow-y-scroll w-80 h-full border-r border-white">
                <p class="text-sm text-white font-bold block px-4 py-2">Rekrutmen</p>
                @foreach ($this->recruitments as $recruitment)
                    <a wire:key="{{ $recruitment->id }}" href="{{ route('recruitments.show', $recruitment->name) }}"
                        class="text-white text-xs block px-4 py-3">{{ $recruitment->name }}</a>
                @endforeach
            </div>
            <div data-menu data-menu-target="prestasi" id="submenu-prestasi" class="hidden top-full left-0 h-full">
                <p class="text-sm text-white font-bold block px-4 py-2">Prestasi</p>
                <a href="#" class="text-white text-xs block px-4 py-3">Tahun 2023</a>
                <a href="#" class="text-white text-xs block px-4 py-3">Tahun 2024</a>
                <a href="#" class="text-white text-xs block px-4 py-3">Tahun 2025</a>
            </div>
            <div data-menu data-menu-target="kompetisi" id="submenu-kompetisi" class="hidden top-full left-0 h-full">
                <p class="text-sm text-white font-bold block px-4 py-2">Kompetisi</p>
                <div class="flex flex-col">
                    @foreach ($this->competitions as $competition)
                        <div class="flex felx-row justify-between pr-2">
                            <a wire:key="{{ $competition->id }}"
                                href="{{ route('competitions.index', $competition->slug) }}"
                                class="text-white text-xs block px-4 py-3">{{ $competition->name }}</a>
                            <img src="/images/navbar/arrow.svg" alt="arrow">
                        </div>
                    @endforeach
                </div>
            </div>
            <div data-menu data-menu-target="market" id="submenu-market" class="hidden top-full left-0 h-full">
                <a href=""></a>
            </div>
            <div data-menu data-menu-target="download" id="submenu-download" class="hidden top-full left-0 h-full">
                <p class="text-sm text-white font-bold block px-4 py-2">Download</p>
                <a href="#" class="text-white text-xs block px-4 py-3">SOP Media Partner</a>
                <a href="#" class="text-white text-xs block px-4 py-3">SOP Publikasi</a>
                <a href="#" class="text-white text-xs block px-4 py-3">SOP Kesekretariatan</a>
                <a href="#" class="text-white text-xs block px-4 py-3">Asset ISR</a>
            </div>
        </div>

        {{-- Sub Sub Menu --}}
        <div class="w-fit h-full">
            <div data-menu data-menu-target="artikel" class="hidden flex-col overflow-y-scroll w-80">
                <p class="text-sm text-white font-bold block px-4 py-2">Lomba Umum</p>
                <a href="#" class="text-white text-xs block px-4 py-3">National Competition</a>
                <a href="#" class="text-white text-xs block px-4 py-3">International Competition</a>
            </div>
            <div data-menu data-menu-target="berita" class="hidden flex-col overflow-y-scroll w-80">
                <p class="text-sm text-white font-bold block px-4 py-2">Ajang Talenta DIKTI</p>
                <a href="#" class="text-white text-xs block px-4 py-3">P2MW</a>
                <a href="#" class="text-white text-xs block px-4 py-3">PKKO</a>
                <a href="#" class="text-white text-xs block px-4 py-3">PKM</a>
            </div>
        </div>
    </div>
</div>
</div>

<script>
    // Background Color Navbar
    window.addEventListener('scroll', function() {
        var navbar = document.getElementById('navbar');
        var navbarContent = document.getElementById('navbar-content');
        if (window.scrollY > 0) {
            navbar.classList.remove.apply(navbar.classList, [
                'bg-transparent',
                'bg-gradient-to-b',
                'from-gray-700',
                'to-transparent',
            ]);
            navbar.classList.add.apply(navbar.classList, [
                'bg-[#0D5568]',
                'shadow-md',
                'border-b',
                'border-b-[#F5D05E]',
            ]);
        } else {
            navbar.classList.remove.apply(navbar.classList, [
                'bg-[#0D5568]',
                'shadow-md',
                'border-b',
                'border-b-[#F5D05E]',
            ]);
            navbar.classList.add.apply(navbar.classList, ['bg-transparent', 'bg-gradient-to-b',
                'from-gray-700'
            ]);
        }
    });

    // Hamburger Menu Navbar
    document.addEventListener('DOMContentLoaded', function() {
        var hamburgerButton = document.querySelector(
            '[data-collapse-toggle="navbar-hamburger"]',
        );
        var navbarHamburger = document.getElementById('navbar-hamburger');

        hamburgerButton.addEventListener('click', function() {
            var expanded =
                hamburgerButton.getAttribute('aria-expanded') === 'true' ||
                false;
            hamburgerButton.setAttribute('aria-expanded', !expanded);
            navbarHamburger.classList.toggle('flex');
        });

        const menus = document.querySelectorAll('[data-menu]');
        var menuParentState = null;
        var subMenuParentState = null;
        menus.forEach(menu => {

            menu.addEventListener('mouseenter', () => {
                const isChild = menu.getAttribute('data-menu-target')
                const isSubmenu = menu.getAttribute('data-submenu')

                console.log(isChild);

                if (!isChild) {
                    if (menuParentState && !isSubmenu) {
                        const subMenu = document.querySelector(
                            `[data-menu-target^="${menuParentState}"]`);
                        subMenu.classList.remove('flex');
                        subMenu.classList.add('hidden');
                        menuParentState = null;

                        if (subMenuParentState) {
                            const subMenu = document.querySelector(
                                `[data-menu-target^="${subMenuParentState}"]`);
                            subMenu.classList.remove('flex');
                            subMenu.classList.add('hidden');
                            subMenuParentState = null;
                        }
                    }

                    if (subMenuParentState && isSubmenu) {
                        const subMenu = document.querySelector(
                            `[data-menu-target^="${subMenuParentState}"]`);
                        subMenu.classList.remove('flex');
                        subMenu.classList.add('hidden');
                        subMenuParentState = null;
                    }
                }

                if (!isChild) {
                    if (!menuParentState && !isSubmenu) {
                        const subMenu = document.querySelector(
                            `[data-menu-target^="${menu.id}"]`);
                        subMenu.classList.remove('hidden');
                        subMenu.classList.add('flex');
                        menuParentState = menu.id;
                    }

                    if (!subMenuParentState && isSubmenu) {
                        const subMenu = document.querySelector(
                            `[data-menu-target^="${menu.id}"]`);
                        subMenu.classList.remove('hidden');
                        subMenu.classList.add('flex');
                        subMenuParentState = menu.id;
                    }
                }

            });

            menu.addEventListener('mouseleave', () => {

                if (menuParentState) {
                    if (subMenuParentState) {
                        if (menu.getAttribute('data-menu-target') === subMenuParentState) {
                            menu.classList.remove('flex');
                            menu.classList.add('hidden');
                            subMenuParentState = null;
                        }
                    } else {
                        if (menu.getAttribute('data-menu-target') === menuParentState) {
                            menu.classList.remove('flex');
                            menu.classList.add('hidden');
                            menuParentState = null;
                        }
                    }
                }
            });
        });

    });
</script>
