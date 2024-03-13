<nav
    class="fixed inset-x-0 top-0 z-10 border-gray-200 bg-transparent dark:bg-gray-900"
>
    <div
        class="mx-auto flex max-w-screen-xl flex-wrap items-center justify-between bg-transparent p-4"
    >
        <div class="flex flex-wrap items-center">
            <button
                data-collapse-toggle="navbar-hamburger"
                type="button"
                class="inline-flex h-10 w-10 items-center justify-center rounded-lg p-2 text-sm text-white focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                aria-controls="navbar-hamburger"
                aria-expanded="false"
            >
                <span class="sr-only">Open main menu</span>
                <svg
                    class="h-5 w-5"
                    aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 17 14"
                >
                    <path
                        stroke="currentColor"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M1 1h15M1 7h15M1 13h15"
                    />
                </svg>
            </button>
            <a
                href="#"
                class="ml-4 flex items-center space-x-3 rtl:space-x-reverse"
            >
                <img src="/images/isr.png" class="h-12" alt="ISR Logo" />
            </a>
        </div>
        <div class="hidden w-full md:block md:w-auto" id="navbar-default">
            <div
                class="mt-4 flex flex-col items-center rounded-lg border border-gray-100 p-4 font-medium md:mt-0 md:flex-row md:space-x-8 md:border-0 md:p-0 rtl:space-x-reverse"
            >
                <div>
                    <a href="#" class="block px-0" aria-current="page">
                        <img
                            src="/images/instagram.svg"
                            class="h-5"
                            alt="ISR instagram"
                        />
                    </a>
                </div>
                <div>
                    <a href="#" class="block px-0" aria-current="page">
                        <img
                            src="/images/twitter.svg"
                            class="h-5"
                            alt="ISR Twitter"
                        />
                    </a>
                </div>
                <div>
                    <a href="#" class="block px-0" aria-current="page">
                        <img
                            src="/images/facebook.svg"
                            class="h-5"
                            alt="ISR Facebook"
                        />
                    </a>
                </div>
                <div>
                    <a href="#" class="block px-0" aria-current="page">
                        <img
                            src="/images/youtube.svg"
                            class="h-5"
                            alt="ISR Youtube"
                        />
                    </a>
                </div>
                <div>
                    <a href="#" class="block px-0" aria-current="page">
                        <img
                            src="/images/tiktok.svg"
                            class="h-5"
                            alt="ISR TikTok"
                        />
                    </a>
                </div>
                <div>
                    <a href="#" class="ml-10 block" aria-current="page">
                        <img
                            src="/images/search.svg"
                            class="h-5"
                            alt="Search"
                        />
                    </a>
                </div>
                @auth
                    @include("layouts.partials.header-right-auth")
                @else
                    @include("layouts.partials.header-right-guest")
                @endauth
            </div>
        </div>
    </div>
</nav>
