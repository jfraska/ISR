@extends('layouts.app')

@section('title', 'Recruitments')

@section('content')
    <article class="min-h-[2000px]">
        <div class="w-full h-[75vh] bg-cover bg-center bg-black bg-blend-multiply bg-opacity-20 shadow-md"
            style="background-image: url('/images/thumbnail-detail.png');">>
        </div>
        <div class="p-8 rounded bg-white -mt-20 mx-auto z-20 w-5/6">
            <x-breadcrumb :category="$category" menu="" />
            <h1 class="text-uppercase text-4xl font-bold mt-5">{{ $category->name }} ISR</h1>

            <div class="grid w-full grid-cols-4 gap-10">
                <div class="col-span-4 md:col-span-3">
                    <livewire:recruitment-list :category="$category">
                </div>
                <div id="side-bar" class="md:border-t-none top-0 col-span-4 h-screen space-y-10 md:col-span-1 md:px-0">
                    <div class="flex flex-col gap-5 py-5 w-full h-auto rounded border border-gray-200 px-3">
                        @include('posts.partials.search-box')

                        {{-- @include('posts.partials.tags-box') --}}
                    </div>
                </div>
            </div>
        </div>
    </article>
@endsection
