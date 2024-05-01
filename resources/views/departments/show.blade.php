@extends('layouts.app')

@section('title', "Departemen $department->title")

@section('content')
    <div class="px-9 md:px-20 py-28">
        <div class="w-full flex flex-col-reverse items-start justify-start md:flex-row gap-10">
            <div class="w-full md:w-1/2 h-full flex flex-col">
                <h1 class="text-2xl font-bold">Departemen {{ $department->title }}</h1>
                <div class="border-b-2 border-[#F5D05E] pt-2 mb-4"></div>
                <div class="text-sm md:text-base prose text-justify">
                    {!! $department->content !!}
                </div>
            </div>
            <div class="w-full md:w-1/2 h-full flex flex-col">
                <img class="w-[700px] h-[480px] border border-black" src="{{ $department->getFirstMediaUrl() }}" alt="department" />
                <div class="bg-white mt-5 px-0 py-1">
                    <h4 class="text-base md:text-lg font-bold py-3 text-justify">Struktur Organisasi {{ $department->title }} ISR UPN "Veteran" Yogyakarta Periode {{ $department->periode }}</h4>
                    <div class="flex flex-col pb-2">
                        <div class="flex flex-row text-justify">
                            <h5 class="w-[200px] text-sm md:text-base font-bold">Kepala Departemen</h5>
                            @foreach ($department->member as $item)
                                @if ($item['role'] === 'kepala')
                                    <p class="text-sm md:text-base font-bold">: {!! $item['name'] !!}</p>
                                @endif
                            @endforeach
                        </div>
                        <div class="flex flex-row">
                            <h5 class="w-[200px] text-sm md:text-base font-bold">Wakil Kepala Departemen</h5>
                            @foreach ($department->member as $item)
                                @if ($item['role'] === 'wakil')
                                    <p class="text-sm md:text-base font-bold">: {!! $item['name'] !!}</p>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="bg-white">
                    <div class="border-t-2 border-[#F5D05E] pt-2"></div>
                    <div class="flex flex-row justify-between pl-0 pr-1">
                        <p class="text-sm md:text-base">Staff {{ $department->title }}</p>
                        <button id="toggle-button" data-collapse-toggle="dropdown-staff" type="button">
                            <img src="/images/arrow-dropdown.svg" alt="dropdown" class="w-[15px] h-[15px] mt-1">
                        </button>
                    </div>
                    <div class="border-b-2 border-[#F5D05E] pt-2"></div>
                    <div id="dropdown-staff" class="px-0 py-2">
                        <ol>
                            @foreach ($department->member as $item)
                                @if ($item['role'] === 'staf')
                                    <li class="text-sm md:text-base">{!! $loop->iteration - 2 !!}. {!! $item['name'] !!}</li>
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
                dropdownStaff.classList.toggle('block');
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
