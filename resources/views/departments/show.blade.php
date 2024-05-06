@extends("layouts.app")

@section("title", $department->title)

@section("content")
    <div class="px-9 py-28 md:px-20">
        <div
            class="flex w-full flex-col-reverse items-start justify-start gap-10 md:flex-row"
        >
            <div class="flex h-full w-full flex-col md:w-1/2">
                <h1 class="text-2xl font-bold">{{ $department->title }}</h1>
                <div class="mb-4 border-b-2 border-[#F5D05E] pt-2"></div>
                <div class="text-justify text-sm md:text-base">
                    @php
                        $content = $department->content;
                        // Tambahkan kelas jika tag <h1> ditemukan
                        $modifiedContent = preg_replace("/<h1>/", '<h1 class="text-md font-regular text-justify mb-5">', $content);
                        // Tambahkan kelas jika tag <h2h1> ditemukan
                        $modifiedContent = preg_replace("/<h2>/", '<h2 class="text-md font-regular text-justify mb-5">', $modifiedContent);
                        // Tambahkan kelas jika tag <h3> ditemukan
                        $modifiedContent = preg_replace("/<h3>/", '<h3 class="text-md font-regular text-justify mb-5">', $modifiedContent);
                        // Tambahkan kelas jika tag <p> ditemukan
                        $modifiedContent = preg_replace("/<p>/", '<p class="text-md font-regular text-justify mb-5">', $modifiedContent);
                        // Tambahkan kelas jika tag <li> ditemukan dalam <ol>
                        $modifiedContent = preg_replace(
                            "/<ol>(.*?)<li>/s",
                            '<ol class="text-md font-regular text-justify mb-5">$1<li class="list-decimal text-md font-regular text-justify ml-5 mb-2">',
                            $modifiedContent,
                        );
                        // Tambahkan kelas jika tag <li> ditemukan dalam <ul>
                        $modifiedContent = preg_replace(
                            "/<ul>(.*?)<li>/s",
                            '<ul class="text-md font-regular text-justify mb-5">$1<li class="list-disc text-md font-regular text-justify ml-5 mb-2">',
                            $modifiedContent,
                        );
                    @endphp

                    {!! $modifiedContent !!}
                </div>
            </div>
            <div class="flex h-full w-full flex-col md:w-1/2">
                <img
                    class="h-[480px] w-[700px] border border-black"
                    src="{{ $department->getFirstMediaUrl() }}"
                    alt="department"
                />
                <div class="mt-5 bg-white px-0 py-1">
                    <h4
                        class="py-3 text-justify text-base font-bold md:text-lg"
                    >
                        Struktur Organisasi {{ $department->title }} ISR UPN
                        "Veteran" Yogyakarta Periode {{ $department->periode }}
                    </h4>
                    <div class="flex flex-col pb-2">
                        <div class="flex flex-row text-justify">
                            <h5
                                class="w-[230px] text-sm font-bold md:text-base"
                            >
                                Kepala Departemen
                            </h5>
                            @foreach ($department->member as $item)
                                @if ($item["role"] === "kepala")
                                    <p class="text-sm font-bold md:text-base">
                                        : {!! $item["name"] !!}
                                    </p>
                                @endif
                            @endforeach
                        </div>
                        <div class="flex flex-row">
                            <h5
                                class="w-[230px] text-sm font-bold md:text-base"
                            >
                                Wakil Kepala Departemen
                            </h5>
                            @foreach ($department->member as $item)
                                @if ($item["role"] === "wakil")
                                    <p class="text-sm font-bold md:text-base">
                                        : {!! $item["name"] !!}
                                    </p>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="bg-white">
                    <div class="border-t-2 border-[#F5D05E] pt-2"></div>
                    <div class="flex flex-row justify-between pl-0 pr-1">
                        <p class="text-sm md:text-base">
                            Staff {{ $department->title }}
                        </p>
                        <button
                            id="toggle-button"
                            data-collapse-toggle="dropdown-staff"
                            type="button"
                        >
                            <img
                                src="/images/arrow-dropdown.svg"
                                alt="dropdown"
                                class="mt-1 h-[15px] w-[15px]"
                            />
                        </button>
                    </div>
                    <div class="border-b-2 border-[#F5D05E] pt-2"></div>
                    <div id="dropdown-staff" class="px-0 py-2">
                        <ol>
                            @foreach ($department->member as $item)
                                @if ($item["role"] === "staf")
                                    <li class="text-sm md:text-base">
                                        {!! $loop->iteration - 2 !!}.
                                        {!! $item["name"] !!}
                                    </li>
                                @endif
                            @endforeach
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Arrow staff department
        document.addEventListener('DOMContentLoaded', function () {
            var dropdownArrow = document.querySelector(
                '[data-collapse-toggle="dropdown-staff"]',
            );
            var dropdownStaff = document.getElementById('dropdown-staff');
            var toggleButton = document.getElementById('toggle-button');

            dropdownArrow.addEventListener('click', function () {
                var expanded =
                    dropdownArrow.getAttribute('aria-expanded') === 'true' ||
                    false;
                dropdownArrow.setAttribute('aria-expanded', !expanded);
                dropdownStaff.classList.toggle('hidden');
                dropdownStaff.classList.toggle('block');
            });

            toggleButton.addEventListener('click', function () {
                var image = document.querySelector('#toggle-button img');
                if (
                    image.getAttribute('src') === '/images/arrow-dropdown.svg'
                ) {
                    image.setAttribute('src', '/images/arrow-dropup.svg');
                } else {
                    image.setAttribute('src', '/images/arrow-dropdown.svg');
                }
            });
        });
    </script>
@endsection
