<div>
    <div class="flex flex-row gap-5">
        @foreach ($this->merchandises as $merchandise)
            <div class="w-[250px] bg-white border border-gray-200 shadow dark:bg-gray-800 dark:border-gray-700">
                <a href="{{ route('merchandise.show', $merchandise->slug) }}">
                    <img class="p-3 w-fit h-[225px]" src="{{ $merchandise->getFirstMediaUrl() }}"
                        alt="merchandise-image" />
                </a>
                <div class="p-3">
                    <a href="#">
                        <h5 class="mb-2 text-base font-bold tracking-tight text-gray-900 dark:text-white">
                            {{ $merchandise->title }}</h5>
                    </a>
                    <p class="mb-3 text-lg font-normal text-[#0D5568] dark:text-gray-400">Rp. {{ $merchandise->price }}
                    </p>
                    <div class="flex items-center justify-center">
                        <a href="#"
                            class="items-center justify-center px-3 py-2 w-[150px] text-sm font-medium text-center text-white bg-[#0D5568] hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
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
