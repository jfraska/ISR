<div class="">
    <nav class="bg-transparent bg-gradient-to-b from-gray-700 to-transparent top-0 inset-x-0 z-50 fixed transition-all duration-200 ease-in-out"
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
                @auth
                    @include('layouts.partials.header-right-auth')
                @else
                    @include('layouts.partials.header-right-guest')
                @endauth
            </div>
        </div>
    </nav>

    <div id="navbar-hamburger" class="hidden mx-16 my-[80px] z-40 fixed bg-[#0D5568] w-11/12 h-3/4">
        <div class="flex flex-row h-full">
            <div class="flex flex-col overflow-y-scroll gap-7 h-full">
                <a id="menu-isr" href="#"
                    class="flex flex-row w-[285px] h-[80px] items-center justify-between px-2 pt-3">
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
                <a id="menu-market" href="{{ route('merchandise.index') }}"
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
            <div class="w-1/4 h-full gap-3">
                <div id="submenu-isr" class="hidden top-full left-0 h-full">
                    <p class="text-sm text-white font-bold block px-4 py-2">Tentang ISR</p>
                    @foreach ($this->organizationals as $organizational)
                        <a wire:key="{{ $organizational->id }}"
                            href="{{ route('abouts.show', $organizational->slug) }}"
                            class="text-white text-xs block px-4 py-3">{{ $organizational->title }}</a>
                    @endforeach
                </div>
                <div id="submenu-ilmiah" class="hidden top-full left-0 h-full">
                    <p class="text-sm text-white font-bold block px-4 py-2">Pojok Ilmiah</p>
                    <a href="#" class="text-white text-xs block px-4 py-3">Artikel</a>
                    <a href="#" class="text-white text-xs block px-4 py-3">Berita</a>
                    <a href="#" class="text-white text-xs block px-4 py-3">Mini Blog</a>
                </div>
                <div id="submenu-departemen" class="hidden top-full left-0 h-full">
                    <p class="text-sm text-white font-bold block px-4 py-2">Departemen</p>
                    @foreach ($this->departments as $department)
                        <a wire:key="{{ $department->id }}" href="{{ route('departments.show', $department->slug) }}"
                            <a wire:key="{{ $department->id }}"
                            href="{{ route('departments.show', $department->slug) }}"
                            class="text-white text-xs block px-4 py-3">{{ $department->title }}</a>
                    @endforeach
                </div>
                <div id="submenu-rekrutmen" class="hidden top-full left-0 h-full">
                    <p class="text-sm text-white font-bold block px-4 py-2">Rekrutmen</p>
                    @foreach ($this->recruitments as $recruitment)
                        <a wire:key="{{ $recruitment->id }}"
                            href="{{ route('recruitments.show', $recruitment->name) }}"
                            class="text-white text-xs block px-4 py-3">{{ $recruitment->name }}</a>
                    @endforeach
                </div>
                <div id="submenu-prestasi" class="hidden top-full left-0 h-full">
                    <p class="text-sm text-white font-bold block px-4 py-2">Prestasi</p>
                    <a href="#" class="text-white text-xs block px-4 py-3">Tahun 2023</a>
                    <a href="#" class="text-white text-xs block px-4 py-3">Tahun 2024</a>
                    <a href="#" class="text-white text-xs block px-4 py-3">Tahun 2025</a>
                </div>
                <div id="submenu-kompetisi" class="hidden top-full left-0 h-full">
                    <p class="text-sm text-white font-bold block px-4 py-2">Kompetisi</p>
                    <div class="flex flex-col">
                        <div class="flex felx-row justify-between pr-2">
                            <a href="#" class="text-white text-xs block px-4 py-3">Lomba Umum</a>
                            <img src="/images/navbar/arrow.svg" alt="arrow">
                        </div>
                        <div class="flex flex-row justify-between pr-2">
                            <a href="#" class="text-white text-xs block px-4 py-3">Ajang Talenta DIKTI</a>
                            <img src="/images/navbar/arrow.svg" alt="arrow">
                        </div>
                    </div>
                </div>
                <div id="submenu-market" class="hidden top-full left-0 h-full">
                    <a href=""></a>
                </div>
                <div id="submenu-download" class="hidden top-full left-0 h-full">
                    <p class="text-sm text-white font-bold block px-4 py-2">Download</p>
                    <a href="#" class="text-white text-xs block px-4 py-3">SOP Media Partner</a>
                    <a href="#" class="text-white text-xs block px-4 py-3">SOP Publikasi</a>
                    <a href="#" class="text-white text-xs block px-4 py-3">SOP Kesekretariatan</a>
                    <a href="#" class="text-white text-xs block px-4 py-3">Asset ISR</a>
                </div>
            </div>
            <div class="flex flex-col w-1/4 h-full">
                <div id="sub-submenu-lomba-umum" class="hidden top-full left-0 h-full">
                    <p class="text-sm text-white font-bold block px-4 py-2">Lomba Umum</p>
                    <a href="#" class="text-white text-xs block px-4 py-3">National Competition</a>
                    <a href="#" class="text-white text-xs block px-4 py-3">International Competition</a>
                </div>
                <div id="sub-submenu-ajang-talenta-dikti" class="hidden top-full left-0 h-full">
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
        // Mendapatkan semua subsubmenu
        const subSubMenus = document.querySelectorAll('[id^="sub-submenu-"]');

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
                subMenu.classList.remove.apply(subMenu.classList, ['hidden']);
                subMenu.classList.add.apply(subMenu.classList, ['block', 'border-r',
                    'border-white'
                ]);
            }
        }

        // Menambahkan event listener untuk setiap menu utama
        parentMenus.forEach(parentMenu => {
            const title = parentMenu.querySelector('h1, p'); // Mengambil elemen h1 atau p di dalam menu

            parentMenu.addEventListener('mouseenter', () => {
                parentMenu.classList.add.apply(parentMenu.classList, ['text-[#F5D05E]']);
                // Panggil fungsi showSubMenu ketika menu utama dihover
                showSubMenu(parentMenu.id);
                if (title) {
                    title.style.color = '#F5D05E'; // Mengubah warna teks pada elemen h1 atau p
                }
            });

            // Menampilkan submenu ketika submenu dihover atau jika menu dan submenu memiliki id yang cocok
            parentMenu.addEventListener('mouseleave', () => {
                setTimeout(() => {
                    const subMenuId = 'submenu-' + parentMenu.id.slice(5);
                    if (!parentMenu.matches(':hover') && !(subMenuId && document
                            .getElementById(subMenuId).matches(':hover'))) {
                        subMenus.forEach(subMenu => {
                            subMenu.classList.remove('block');
                            subMenu.classList.add('hidden');
                        });
                        if (title) {
                            title.style.color =
                                ''; // Mengembalikan warna teks ke default saat tidak dihover
                        }
                    }
                }, 200);
            });
        });

        // Menambahkan event listener untuk setiap submenu
        subMenus.forEach(subMenu => {
            const subMenuLinks = subMenu.querySelectorAll(
                'a'); // Mengambil semua elemen a di dalam submenu

            subMenuLinks.forEach(link => {
                link.addEventListener('mouseenter', () => {
                    link.style.color =
                        '#F5D05E'; // Mengubah warna teks pada elemen a di submenu saat dihover
                });

                link.addEventListener('mouseleave', () => {
                    link.style.color =
                        ''; // Mengembalikan warna teks ke default saat tidak dihover
                });
            });

            subMenu.addEventListener('mouseleave', () => {
                // Sembunyikan submenu saat mouse meninggalkan submenu
                subMenu.classList.remove('block');
                subMenu.classList.add('hidden');
            });
        });
    });
</script>
