
<div class="container bg-[#0D5568] px-5 pt-4 pb-10">
    <div class="flex justify-center pb-2">
        <p class="text-[25px] font-bold" style="color: white;">
            Tentang ISR
        </p>
    </div>
    @foreach ($this->organizationals as $organizational)
        <a wire:key="{{ $organizational->id }}" href="{{ route('abouts.show', $organizational->slug) }}">
            <div class="min-h-[35px] px-2 py-4 container" style="border-bottom: 1px solid #f5d05e;">
                <p class="text-[15px] font-light" style="color: white;">
                    {{ $organizational->title }}
                </p>
            </div>
        </a>
    @endforeach
</div>