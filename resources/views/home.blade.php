<x-app-layout>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        @foreach($posts as $post)
            <x-post-card :post="$post" />
        @endforeach
    </div>
</x-app-layout>