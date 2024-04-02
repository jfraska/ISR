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

    <div id="navbar-hamburger" class="hidden">
        @auth
            @include('layouts.partials.header-right-auth')
        @else
            @include('layouts.partials.header-right-guest')
        @endauth
        <!-- Daftar menu -->
        <a href="#" class="block px-4 py-2 relative font-bold">Tentang ISR
            <div class="hidden top-full left-0 bg-white shadow-lg rounded-lg">
                <!-- Submenu -->
                <a href="#" class="block px-4 py-2">Visi Misi dan Tujuan UKM</a>
                <a href="#" class="block px-4 py-2">Profil UKM</a>
                <a href="#" class="block px-4 py-2">Struktur Organisasi</a>
                <a href="#" class="block px-4 py-2">Profil Kabinet Widyantara Abisatya</a>
                <a href="#" class="block px-4 py-2">Sambutan Ketua ISR</a>
                <a href="#" class="block px-4 py-2">Sambutan Pembina ISR</a>
            </div>
        </a>
        <a href="#" class="block px-4 py-2 relative font-bold">Pojok Ilmiah
            <div class="hidden top-full left-0 bg-white shadow-lg rounded-lg">
                <!-- Submenu -->
                <a href="#" class="block px-4 py-2">Artikel</a>
                <a href="#" class="block px-4 py-2">Berita</a>
                <a href="#" class="block px-4 py-2">Mini Blog</a>
            </div>
        </a>
        <a href="#" class="block px-4 py-2 relative font-bold">Departemen</a>
        <div class="hidden top-full left-0 bg-white shadow-lg rounded-lg">
            <!-- Submenu -->
            @foreach ($this->departments as $department)
                <a wire:navigate wire:key="{{ $department->id }}"
                    href="{{ route('departments.show', $department->slug) }}"
                    class="block px-4 py-2">{{ $department->title }}</a>
            @endforeach
        </div>
    </div>
</nav>

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
        var menuItems = document.querySelectorAll('#navbar-hamburger > a');

        hamburgerButton.addEventListener('click', function() {
            var expanded =
                hamburgerButton.getAttribute('aria-expanded') === 'true' ||
                false;
            hamburgerButton.setAttribute('aria-expanded', !expanded);
            navbarHamburger.classList.toggle('hidden');
        });

        // Tambahkan event listener untuk setiap elemen menu
        menuItems.forEach(function(menuItem) {
            menuItem.addEventListener('click', function(event) {
                event.preventDefault(); // Menghentikan perilaku bawaan dari anchor tag

                // Mengambil referensi ke div yang berisi submenu 5 dan 6
                var submenuDiv = menuItem.nextElementSibling;

                // Menghapus kelas 'hidden' dari div submenu jika ada
                if (submenuDiv) {
                    submenuDiv.classList.toggle('hidden');
                }
            });
        });
    });
</script>
