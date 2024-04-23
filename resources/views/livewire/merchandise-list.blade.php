<div>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @foreach ($this->merchandises as $merchandise)
            <div class="w-full bg-white border border-gray-200 shadow dark:bg-gray-800 dark:border-gray-700">
                <a href="{{ route('merchandise.show', $merchandise->slug) }}">
                    <img class="px-5 py-3 w-fit h-[200px]" src="{{ $merchandise->getFirstMediaUrl() }}"
                        alt="merchandise-image" />
                </a>
                <div class="px-5">
                    <a href="{{ route('merchandise.show', $merchandise->slug) }}">
                        <h2 class="mb-2 text-xl font-semibold tracking-tight text-gray-900 dark:text-white">
                            {{ $merchandise->title }}</h2>
                    </a>
                    <p class="mb-3 text-lg font-semibold text-[#0D5568] dark:text-gray-400">Rp.
                        {{ number_format($merchandise->price, 0, ',', '.') }}
                    </p>
                    <div class="flex items-center justify-center pb-5">
                        <a href="{{ $merchandise->link_buy }}"
                            class="items-center justify-center rounded px-3 py-2 w-3/4 text-sm font-medium text-center text-white bg-[#0D5568] hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            BELI
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="my-3">
        {{ $this->merchandises->onEachSide(1)->links() }}
    </div>
</div>
