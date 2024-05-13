@extends('layouts.app')

@section('title', 'Competitions')

@section('content')
    <article class="col-span-4 w-full min-h-[2000px] md:col-span-3 flex flex-col items-center">
        <div class="w-full h-[75vh] bg-cover bg-center bg-black bg-blend-multiply bg-opacity-20 shadow-md" style="background-image: url('/images/thumbnail-competition.png');">>
        </div>
        <div class="px-5 bg-white -mt-20 z-20 w-5/6">
            <div class="grid w-full grid-cols-4 gap-10 pt-16">
                <div class="col-span-4 md:col-span-3">
                    <x-breadcrumb :category="$category" menu="" />
                    <h1 class="text-uppercase text-4xl font-bold mt-5">{{ $category->name }} terkini</h1>
                    <livewire:competition-list :category="$category">
                </div>
                <div id="side-bar" class="md:border-t-none top-0 col-span-4 h-screen space-y-10 pt-10 md:col-span-1 md:px-0">
                    <div class="flex flex-col gap-5 p-5 w-full h-auto rounded-lg shadow">
                        @include('posts.partials.search-box')

                        {{-- @include('posts.partials.tags-box') --}}
                    </div>
                </div>
            </div>
        </div>
    </article>
@endsection
