@props(['competition'])

<div class="rounded-lg shadow w-[400px] h-96 bg-[#0D5568]">
    <a href="{{ route('competitions.show', ['category' => $competition->category, 'competition' => $competition->slug]) }}">
        <div class="flex flex-col h-80 relative rounded-lg"
            style="background-image: url('{{ $competition->getFirstMediaUrl() }}'); background-size: cover; background-position: center;">
            <p class="absolute left-2 bottom-2 text-base font-semibold text-white text-wrap">{{ $competition->title }}</p>
        </div>
        <div class="p-5 flex items-center justify-center">
            <h5 class="mb-2 text-base tracking-tight text-white text-center">{!! $competition->published_at !!}</h5>
        </div>
    </a>
</div>
