@extends("layouts.app")

@section("title", "Blog")

@section("content")
    <div class="container mx-auto flex flex-grow px-5">
        <div class="grid w-full grid-cols-4 gap-10">
            <div class="col-span-4 md:col-span-3">
                @livewire("post-list")
            </div>
            <div
                id="side-bar"
                class="md:border-t-none sticky top-0 col-span-4 h-screen space-y-10 border-t border-gray-100 border-t-gray-100 px-3 py-6 pt-10 md:col-span-1 md:border-l md:px-6"
            >
                @include("posts.partials.search-box")

                @include("posts.partials.tags-box")
            </div>
        </div>
    </div>
@endsection
