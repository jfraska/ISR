@props(['items'])

<div class="">
    @foreach ($items as $item)
        @if ($item['type'] === 'heading')
            @if ($item['data']['level'] === 'h1')
                <h1>{!! $item['data']['content'] !!}</h1>
            @endif
            @if ($item['data']['level'] === 'h2')
                <h2>{!! $item['data']['content'] !!}</h2>
            @endif
            @if ($item['data']['level'] === 'h3')
                <h3>{!! $item['data']['content'] !!}</h3>
            @endif
        @endif
        @if ($item['type'] === 'paragraph')
            <p class="text-sm font-bold">{!! $item['data']['content'] !!}</p>
        @endif
        @if ($item['type'] === 'image')
            <img src="{{ $item['data']['url'] }}" alt="{{ $item['data']['alt'] }}">
        @endif
        {{-- @if ($item['type'] === 'attachment')
            <img src="{{ $item['data']['url'] }}" alt="{{ $item['data']['alt'] }}">
        @endif --}}
    @endforeach
</div>
