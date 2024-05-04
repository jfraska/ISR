@props(['post'])

<div class="rounded-lg shadow w-60 h-60 md:w-96 md:h-96 bg-[#0D5568]">
    <a href="{{ route('posts.show', ['category' => $post->category, 'post' => $post->slug]) }}">
        <div class="flex flex-col h-52 md:h-80 relative rounded-lg"
            style="background-image: url('{{ $post->getFirstMediaUrl() }}'); background-size: cover; background-position: center;">
            <p class="absolute left-2 bottom-2 text-sm md:text-base font-semibold text-white text-wrap shadow-lg">{{ $post->title }}</p>
        </div>
        <div class="p-2 md:p-5 flex items-center justify-center">
            <h5 class="mb-2 text-xs md:text-base tracking-tight text-white text-center">{!! \Carbon\Carbon::parse($post->published_at)->format('d F Y, H:i') !!}</h5>
        </div>
    </a>
</div>
