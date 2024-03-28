<nav class="bg-transparent bg-gradient-to-b from-gray-700 to-transparent top-0 left-0 right-0 inset-x-0 z-50 fixed transition-all duration-200 ease-in-out" id="navbar">
    <div class="bg-transparent max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4"
        id="navbar-content">
        <div class="flex flex-wrap items-center">
            <button data-collapse-toggle="navbar-hamburger" type="button"
                class="inline-flex items-center justify-center p-2 w-10 h-10 text-sm text-white rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                aria-controls="navbar-hamburger" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M1 1h15M1 7h15M1 13h15" />
                </svg>
            </button>
            <div class="flex flex-row items-center p-1 md:p-0">
                <a href="#" class="flex items-center space-x-3 rtl:space-x-reverse ml-4">
                    <img src="/images/upn-blu-navbar-logo.png" class="h-12" alt="UPN BLU Logo" />
                </a>
                <a href="#" class="flex items-center space-x-3 rtl:space-x-reverse ml-2">
                    <img src="/images/isr-navbar-logo.png" class="h-12" alt="ISR Logo" />
                </a>
                <a href="#" class="flex items-center space-x-3 rtl:space-x-reverse ml-2">
                    <img src="/images/isr-navbar-logo2.png" class="h-12" alt="ISR Logo2" />
                </a>
            </div>
        </div>
        <div class="hidden w-full md:block md:w-auto" id="navbar-default">
            <div
                class="font-medium flex flex-col items-center p-4 md:p-0 mt-4 border border-gray-100 rounded-lg md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0">
                <div>
                    <a href="#" class="block px-0" aria-current="page"><img src="/images/instagram.svg"
                            class="h-5" alt="ISR instagram" /></a>
                </div>
                <div>
                    <a href="#" class="block px-0" aria-current="page"><img src="/images/twitter.svg"
                            class="h-5" alt="ISR Twitter" /></a>
                </div>
                <div>
                    <a href="#" class="block px-0" aria-current="page"><img src="/images/youtube.svg"
                            class="h-5" alt="ISR Youtube" /></a>
                </div>
                <div>
                    <a href="#" class="block ml-10" aria-current="page"><img src="/images/search.svg"
                            class="h-5" alt="Search" /></a>
                </div>
            </div>
        </div>
    </div>

    <div id="navbar-hamburger" class="hidden">
        <!-- Daftar menu -->
        <a href="#" class="block px-4 py-2 relative">Menu 1
            <div class="hidden absolute top-full left-0 bg-white shadow-lg rounded-lg">
                <!-- Submenu -->
                <a href="#" class="block px-4 py-2">Submenu 1</a>
                <a href="#" class="block px-4 py-2">Submenu 2</a>
            </div>
        </a>
        <a href="#" class="block px-4 py-2 relative">Menu 2
            <div class="hidden absolute top-full left-0 bg-white shadow-lg rounded-lg">
                <!-- Submenu -->
                <a href="#" class="block px-4 py-2">Submenu 3</a>
                <a href="#" class="block px-4 py-2">Submenu 4</a>
            </div>
        </a>
        <div class="relative">
            <a href="#" class="block px-4 py-2">Menu 3</a>
            <div class="hidden absolute top-full left-0 bg-white shadow-lg rounded-lg">
                <!-- Submenu -->
                <a href="#" class="block px-4 py-2">Submenu 5</a>
                <a href="#" class="block px-4 py-2">Submenu 6</a>
            </div>
        </div>
    </div>
</nav>

<script>
    // Background Color Navbar
    window.addEventListener('scroll', function() {
        var navbar = document.getElementById('navbar');
        var navbarContent = document.getElementById('navbar-content');
        if (window.scrollY > 0) {
            navbar.classList.remove.apply(navbar.classList, ['bg-transparent', 'bg-gradient-to-b',
                'from-gray-700', 'to-transparent'
            ]);
            navbar.classList.add.apply(navbar.classList, ['bg-[#0D5568]', 'shadow-md', 'border-b-2',
                'border-b-[#F5D05E]'
            ]);
        } else {
            navbar.classList.remove.apply(navbar.classList, ['bg-[#0D5568]', 'shadow-md', 'border-b-2',
                'border-b-[#F5D05E]'
            ]);
            navbar.classList.add.apply(navbar.classList, ['bg-transparent', 'bg-gradient-to-b',
                'from-gray-700']);
        }
    });

    // Hamburger Menu Navbar
    document.addEventListener('DOMContentLoaded', function() {
        var hamburgerButton = document.querySelector('[data-collapse-toggle="navbar-hamburger"]');
        var navbarHamburger = document.getElementById('navbar-hamburger');

        hamburgerButton.addEventListener('click', function() {
            var expanded = hamburgerButton.getAttribute('aria-expanded') === 'true' || false;
            hamburgerButton.setAttribute('aria-expanded', !expanded);
            navbarHamburger.classList.toggle('hidden');
        });
    });
</script>