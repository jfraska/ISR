@extends('layouts.app')

@section('title', 'Merchandise')

@section('content')
    <div class="flex flex-col">
        <div class="flex flex-row">
            <img src="/images/merchandise.png" alt="merchandise" class="h-full w-full object-cover">
            <div class="flex justify-end items-center">
                <h1 class="font-black text-xl sm:text-3xl md:text-4xl lg:text-5xl absolute text-white pr-10">MERCHANDISE OF
                    ISR</h1>
            </div>
        </div>
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-4 py-12">
            @livewire('merchandise-list')
        </div>
    </div>
@endsection
