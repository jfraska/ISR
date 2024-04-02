@extends('layouts.app')

@section('title', $department->title)

@section('content')
    <div class="px-20 py-28">
        <div class="flex flex-row gap-10">
            <div class="w-[500px] h-fit flex flex-col">
                {{-- @foreach ($department->content as $item)
                    @if ($item['type'] === 'paragraph')
                    <div class="">
                        {!! $item['data']['content'] !!}
                    </div>
                    @endif
                @endforeach --}}
                <h1 class="text-2xl font-bold">{{ $department->title }}</h1>
                <div class="border-b-2 border-[#F5D05E] pt-2"></div>
                <p class="w-[500px] h-fit text-base py-5">Departemen Pengembangan Sumber Daya Manusia (PSDM) merupakan salah
                    satu departemen
                    dalam Interdisciplinary Scientific Research (ISR) UPN “ Veteran” Yogyakarta, yang bertanggung jawab atas
                    penyerapan, pemeliharaan, dan pengembangan sumber daya manusia yang ada di dalamnya, serta hal-hal yang
                    bersifat internal. Departemen ini juga bertugas mempererat hubungan internal organisasi meialui
                    kegiatan-kegiatan yang bersifat informal dan kekeluargaan.</p>
                <h4 class="w-[500px] h-fit text-base font-bold">Program Kerja Pengembangan Sumber Daya Manusia ISR UPN
                    "Veteran" Yogyakarta Periode 2021/2022 :</h4>
                <h5 class="w-[500px] h-fit text-base font-bold pt-3">Eksternal</h5>
                <ol>
                    <li>1. Expo UKM</li>
                    <li>2. ISR Development Project</li>
                    <li>3. Open Recuitment</li>
                </ol>
                <h5 class="w-[500px] h-fit text-base font-bold pt-3">Internal</h5>
                <ol>
                    <li>1. Expo UKM</li>
                    <li>2. ISR Development Project</li>
                    <li>3. Open Recuitment</li>
                </ol>
            </div>
            <div class="flex flex-col">
                <img class="w-[]700px h-[480px]" src="{{ $department->getFirstMediaUrl() }}" alt="department" />
                <div class="bg-white mt-5 px-4 py-1">
                    <h4 class="text-base font-bold py-3">Struktur Organisasi Departemen Pengembangan Sumber Daya Manusia
                        (PSDM) ISR UPN "Veteran" Yogyakarta Periode 2021/2022</h4>
                    <div class="flex flex-col pb-2">
                        <div class="flex flex-row">
                            <h5 class="w-[180px] text-sm font-bold">Kepala Departemen</h5>
                            @foreach ($department->member as $item)
                                @if ($item['role'] === 'kepala')
                                    <p class="text-sm font-bold">: {!! $item['name'] !!}</p>
                                @endif
                            @endforeach
                        </div>
                        <div class="flex flex-row">
                            <h5 class="w-[180px] text-sm font-bold">Wakil Kepala Departemen</h5>
                            @foreach ($department->member as $item)
                                @if ($item['role'] === 'wakil')
                                    <p class="text-sm font-bold">: {!! $item['name'] !!}</p>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="bg-white">
                    <div class="border-t-2 border-[#F5D05E] pt-2"></div>
                    <div class="flex flex-row justify-between px-4">
                        <p class="text-base">Staff Pengembangan Sumber Daya Manusia ( PSDM ) </p>
                        <button id="toggle-button" data-collapse-toggle="dropdown-staff" type="button">
                            <img src="/images/arrow-dropdown.svg" alt="dropdown" class="w-[15px] h-[15px] mt-1">
                        </button>
                    </div>
                    <div class="border-b-2 border-[#F5D05E] pt-2"></div>
                    <div id="dropdown-staff" class="hidden px-4 py-2">
                        <ol>
                            @foreach ($department->member as $item)
                                @if ($item['role'] === 'staf')
                                    <li>{!! $loop->iteration - 2 !!}. {!! $item['name'] !!}</li>
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
        document.addEventListener('DOMContentLoaded', function() {
            var dropdownArrow = document.querySelector('[data-collapse-toggle="dropdown-staff"]');
            var dropdownStaff = document.getElementById('dropdown-staff');
            var toggleButton = document.getElementById('toggle-button');

            dropdownArrow.addEventListener('click', function() {
                var expanded = dropdownArrow.getAttribute('aria-expanded') === 'true' || false;
                dropdownArrow.setAttribute('aria-expanded', !expanded);
                dropdownStaff.classList.toggle('hidden');
            });

            toggleButton.addEventListener("click", function() {
                var image = document.querySelector("#toggle-button img");
                if (image.getAttribute("src") === "/images/arrow-dropdown.svg") {
                    image.setAttribute("src", "/images/arrow-dropup.svg");
                } else {
                    image.setAttribute("src", "/images/arrow-dropdown.svg");
                }
            });
        })
    </script>
@endsection
