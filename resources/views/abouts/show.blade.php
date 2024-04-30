@extends('layouts.app')

@section('title', "$organizational->title")

@section('content')
    <div class="relative px-40 py-28 min-w-[240px]">
        <div class="flex flex-row gap-10">
            <div class="flex flex-col w-[550px] h-[450px] bg-[#0D5568]">

            </div>
            <div class="flex flex-col min-w-[750px] max-w-[750px]">
                <h1 class="font-bold text-[32px]">{{ $organizational->title }}</h1>
                <img src="{{ $organizational->getFirstMediaUrl() }}" alt="isr-logo" class="w-[350px] h-[350px] mx-auto py-5">
                <x-content :items="$organizational->content"/>
            </div>
        </div>
        <div class="absolute bottom-0 left-0">
            <img src="/images/side-decor-bottom-left.png" alt="" />
        </div>
    </div>
@endsection
