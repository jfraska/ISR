@extends('layouts.app')

@section('title', 'Blog')

@section('content')
    <div class="container mx-auto px-5 flex flex-grow">
        <div class="w-full grid grid-cols-4 gap-10">
            <div class="md:col-span-3 col-span-4">
                @livewire('post-list')
            </div>
            <div id="side-bar"
                class="sticky top-0 h-screen col-span-4 px-3 py-6 pt-10 space-y-10 border-t border-gray-100 border-t-gray-100 md:border-t-none md:col-span-1 md:px-6 md:border-l">
                @include('posts.partials.search-box')

                @include('posts.partials.tags-box')
            </div>
        </div>
    </div>
@endsection
