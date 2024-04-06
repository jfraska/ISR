@extends("layouts.app")

@section("title", "Merchandise of ISR")

@section("content")
    <div class="flex flex-col">
        <div class="flex flex-row">
            <img src="/images/merchandise.png" alt="merchandise" class="h-full w-full object-cover">
            <div class="flex justify-end items-center">
                <h1 class="font-bold text-[64px] absolute text-white pr-10">MERCHANDISE OF ISR</h1>
            </div>
        </div>
        <div class="py-5 px-10 flex flex-row">
            @livewire("merchandise-list")
        </div>
    </div>
@endsection
