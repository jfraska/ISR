<div class="">
    <nav class="bg-transparent bg-gradient-to-b from-gray-700 to-transparent top-0 left-0 right-0 inset-x-0 z-50 fixed transition-all duration-200 ease-in-out"
        id="navbar">
        <div class="bg-transparent max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4"
            id="navbar-content">
            <div class="flex flex-wrap items-center">
                <button data-collapse-toggle="navbar-hamburger" type="button"
                    class="inline-flex h-10 w-10 items-center justify-center rounded-lg p-2 text-sm text-white focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                    aria-controls="navbar-hamburger" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg class="h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 17 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M1 1h15M1 7h15M1 13h15" />
                    </svg>
                </button>
                <div class="flex flex-row items-center p-1 md:p-0">
                    <a href="#" class="ml-4 flex items-center space-x-3 rtl:space-x-reverse">
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

    <div id="navbar-hamburger" class="hidden mx-16 my-[80px] z-20 fixed bg-[#0D5568] w-11/12 h-3/4">
        {{-- @auth
            @include('layouts.partials.header-right-auth')
        @else
            @include('layouts.partials.header-right-guest')
        @endauth --}}

        <div class="flex flex-row h-full">
            <div class="flex flex-col overflow-y-scroll gap-5 h-full">
                <a id="menu-isr" href="#"
                    class="flex flex-row w-[285px] h-[80px] items-center justify-between px-2">
                    <div class="flex flex-row">
                        <img src="/images/navbar/isr.svg" alt="isr" class="w-[50px] h-[50px]">
                        <div class="flex flex-col justify-center">
                            <p class="font-bold text-base text-white">Tentang ISR</p>
                            <p class="text-[10px] text-white">Kenal lebih dekat dengan ISR</p>
                        </div>
                    </div>
                    <img src="/images/navbar/arrow.svg" alt="arrow" class="w-[25px] h-[25px]">
                </a>
                <a id="menu-ilmiah" href="#"
                    class="flex flex-row w-[285px] h-[80px] items-center justify-between px-2">
                    <div class="flex flex-row">
                        <img src="/images/navbar/ilmiah.svg" alt="ilmiah" class="w-[50px] h-[50px]">
                        <div class="flex flex-col justify-center">
                            <p class="font-bold text-base text-white">Pojok Ilmiah</p>
                            <p class="text-[10px] text-white">Baca artikel, berita, dan mini blog</p>
                        </div>
                    </div>
                    <img src="/images/navbar/arrow.svg" alt="arrow" class="w-[25px] h-[25px]">
                </a>
                <a id="menu-departemen" href="#"
                    class="flex flex-row w-[285px] h-[80px] items-center justify-between px-2">
                    <div class="flex flex-row">
                        <img src="/images/navbar/departemen.svg" alt="departemen" class="w-[50px] h-[50px]">
                        <div class="flex flex-col justify-center">
                            <p class="font-bold text-base text-white">Departemen</p>
                            <p class="text-[10px] text-white">Ragam departemen di ISR</p>
                        </div>
                    </div>
                    <img src="/images/navbar/arrow.svg" alt="arrow" class="w-[25px] h-[25px]">
                </a>
                <a id="menu-rekrutmen" href="#"
                    class="flex flex-row w-[285px] h-[80px] items-center justify-between px-2">
                    <div class="flex flex-row">
                        <img src="/images/navbar/rekrutmen.svg" alt="rekrutmen" class="w-[50px] h-[50px]">
                        <div class="flex flex-col justify-center">
                            <p class="font-bold text-base text-white">Rekrutmen</p>
                            <p class="text-[10px] text-white">Ragam seleksi keanggotaan ISR</p>
                        </div>
                    </div>
                    <img src="/images/navbar/arrow.svg" alt="arrow" class="w-[25px] h-[25px]">
                </a>
                <a id="menu-prestasi" href="#"
                    class="flex flex-row w-[285px] h-[80px] items-center justify-between px-2">
                    <div class="flex flex-row">
                        <img src="/images/navbar/prestasi.svg" alt="prestasi" class="w-[50px] h-[50px]">
                        <div class="flex flex-col justify-center">
                            <p class="font-bold text-base text-white">Prestasi</p>
                            <p class="text-[10px] text-white">Prestasi yang dicapai oleh tim ISR</p>
                        </div>
                    </div>
                    <img src="/images/navbar/arrow.svg" alt="arrow" class="w-[25px] h-[25px]">
                </a>
                <a id="menu-kompetisi" href="#"
                    class="flex flex-row w-[285px] h-[80px] items-center justify-between px-2">
                    <div class="flex flex-row">
                        <img src="/images/navbar/kompetisi.svg" alt="kompetisi" class="w-[50px] h-[50px]">
                        <div class="flex flex-col justify-center">
                            <p class="font-bold text-base text-white">Kompetisi</p>
                            <p class="text-[10px] text-white">Pendaftaran lomba dan kompetisi</p>
                        </div>
                    </div>
                    <img src="/images/navbar/arrow.svg" alt="arrow" class="w-[25px] h-[25px]">
                </a>
                <a id="menu-market" href="#"
                    class="flex flex-row w-[285px] h-[80px] items-center justify-start px-2">
                    <div class="flex flex-row">
                        <img src="/images/navbar/market.svg" alt="market" class="w-[50px] h-[50px]">
                        <div class="flex flex-col justify-center">
                            <p class="font-bold text-base text-white">Market</p>
                            <p class="text-[10px] text-white">Beragam Merchandise dari ISR UPN</p>
                        </div>
                    </div>
                </a>
                <a id="menu-download" href="#"
                    class="flex flex-row w-[285px] h-[80px] items-center justify-between px-2">
                    <div class="flex flex-row">
                        <img src="/images/navbar/download.svg" alt="download" class="w-[50px] h-[50px]">
                        <div class="flex flex-col justify-center">
                            <p class="font-bold text-base text-white">Download</p>
                            <p class="text-[10px] text-white">Asset ISR dan dokumen SOP</p>
                        </div>
                    </div>
                    <img src="/images/navbar/arrow.svg" alt="arrow" class="w-[25px] h-[25px]">
                </a>
            </div>
            <div class="h-full">
                <div id="submenu-isr" class="hidden top-0 z-50 bg-white shadow-lg">
                    <a href="{{ route('abouts.visimisi') }}" class="block px-4 py-2">Visi Misi dan Tujuan UKM</a>
                    <a href="#" class="block px-4 py-2">Profil UKM</a>
                    <a href="{{ route('abouts.struktur') }}" class="block px-4 py-2">Struktur Organisasi</a>
                    <a href="#" class="block px-4 py-2">Profil Kabinet Widyantara Abisatya</a>
                    <a href="#" class="block px-4 py-2">Sambutan Ketua ISR</a>
                    <a href="#" class="block px-4 py-2">Sambutan Pembina ISR</a>
                </div>
                <div id="submenu-ilmiah" class="hidden top-full left-0 bg-white shadow-lg">
                    <a href="#" class="block px-4 py-2">Artikel</a>
                    <a href="#" class="block px-4 py-2">Berita</a>
                    <a href="#" class="block px-4 py-2">Mini Blog</a>
                </div>
                <div id="submenu-departemen" class="hidden top-full left-0 bg-white shadow-lg">
                    @foreach ($this->departments as $department)
                        <a wire:navigate wire:key="{{ $department->id }}"
                            href="{{ route('departments.show', $department->slug) }}"
                            class="block px-4 py-2">{{ $department->title }}</a>
                    @endforeach
                </div>
                <div id="submenu-rekrutmen" class="hidden top-full left-0 bg-white shadow-lg">
                    <a href="#" class="block px-4 py-2">Volunteer</a>
                    <a href="#" class="block px-4 py-2">Open Recruitmen UKM ISR</a>
                    <a href="#" class="block px-4 py-2">Pendaftaran Kepanitiaan</a>
                </div>
                <div id="submenu-prestasi" class="hidden top-full left-0 bg-white shadow-lg">
                    <a href="#" class="block px-4 py-2">Tahun 2023</a>
                    <a href="#" class="block px-4 py-2">Tahun 2024</a>
                    <a href="#" class="block px-4 py-2">Tahun 2025</a>
                </div>
                <div id="submenu-kompetisi" class="hidden top-full left-0 bg-white shadow-lg">
                    <a href="#" class="block px-4 py-2">Lomba Umum</a>
                    <a href="#" class="block px-4 py-2">Ajang Talenta DIKTI</a>
                </div>
                <div id="submenu-market" class="hidden top-full left-0 bg-white shadow-lg">
                    <a href=""></a>
                </div>
                <div id="submenu-download" class="hidden top-full left-0 bg-white shadow-lg">
                    <a href="#" class="block px-4 py-2">SOP Media Partner</a>
                    <a href="#" class="block px-4 py-2">SOP Publikasi</a>
                    <a href="#" class="block px-4 py-2">SOP Kesekretariatan</a>
                    <a href="#" class="block px-4 py-2">Asset ISR</a>
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
                'border-b-2',
                'border-b-[#F5D05E]',
            ]);
        } else {
            navbar.classList.remove.apply(navbar.classList, [
                'bg-[#0D5568]',
                'shadow-md',
                'border-b-2',
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
        var menuItems = document.querySelectorAll('#navbar-hamburger div a');

        hamburgerButton.addEventListener('click', function() {
            var expanded =
                hamburgerButton.getAttribute('aria-expanded') === 'true' ||
                false;
            hamburgerButton.setAttribute('aria-expanded', !expanded);
            navbarHamburger.classList.toggle('hidden');
        });

        // Mendapatkan semua elemen menu utama
        const parentMenus = document.querySelectorAll('[id^="menu-"]');
        // Mendapatkan semua submenu
        const subMenus = document.querySelectorAll('[id^="submenu-"]');

        // Fungsi untuk menampilkan submenu
        function showSubMenu(menuId) {
            // Sembunyikan semua submenu terlebih dahulu
            subMenus.forEach(subMenu => {
                subMenu.classList.remove('block');
                subMenu.classList.add('hidden');
            });

            // Tampilkan submenu yang sesuai dengan menuId
            const subMenu = document.getElementById('submenu-' + menuId.slice(
            5)); // Menghilangkan "menu-" dari id untuk mendapatkan id submenu yang sesuai
            if (subMenu) {
                subMenu.classList.remove('hidden');
                subMenu.classList.add('block');
            }
        }

        // Menambahkan event listener untuk setiap menu utama
        parentMenus.forEach(parentMenu => {
            parentMenu.addEventListener('mouseenter', () => {
                // Panggil fungsi showSubMenu ketika menu utama dihover
                showSubMenu(parentMenu.id);
            });

            // Sembunyikan submenu ketika mouse keluar dari menu utama
            parentMenu.addEventListener('mouseleave', () => {
                subMenus.forEach(subMenu => {
                    subMenu.classList.remove('block');
                    subMenu.classList.add('hidden');
                });
            });
        });
    });
</script>
