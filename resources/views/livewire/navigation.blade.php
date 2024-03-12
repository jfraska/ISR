<nav class="bg-transparent border-gray-200 dark:bg-gray-900 absolute top-0 inset-x-0 z-10">
    <div class="bg-transparent max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        <div class="flex flex-wrap items-center">
            <button data-collapse-toggle="navbar-hamburger" type="button"
                class="inline-flex items-center justify-center p-2 w-10 h-10 text-sm text-white rounded-lg  focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                aria-controls="navbar-hamburger" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M1 1h15M1 7h15M1 13h15" />
                </svg>
            </button>
            <a href="#" class="flex items-center space-x-3 rtl:space-x-reverse ml-4">
                <img src="/images/isr.png" class="h-12" alt="ISR Logo" />
            </a>
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
                    <a href="#" class="block px-0" aria-current="page"><img src="/images/facebook.svg"
                            class="h-5" alt="ISR Facebook" /></a>
                </div>
                <div>
                    <a href="#" class="block px-0" aria-current="page"><img src="/images/youtube.svg"
                            class="h-5" alt="ISR Youtube" /></a>
                </div>
                <div>
                    <a href="#" class="block px-0" aria-current="page"><img src="/images/tiktok.svg"
                            class="h-5" alt="ISR TikTok" /></a>
                </div>
                <div>
                    <a href="#" class="block ml-10" aria-current="page"><img src="/images/search.svg"
                            class="h-5" alt="Search" /></a>
                </div>
                @auth
                    @include('layouts.partials.header-right-auth')
                @else
                    @include('layouts.partials.header-right-guest')
                @endauth
            </div>
        </div>
    </div>
</nav>
