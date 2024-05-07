<div class="container bg-[#0D5568] px-5 pt-4 pb-10 w-full">
    <div class="flex justify-center pb-2">
        <p class="text-[25px] font-bold" style="color: white;">
            Download
        </p>
    </div>
    @php
        $uniqueCategories = $this->downloads->flatMap->categories->unique('id');
    @endphp

    @foreach ($uniqueCategories as $category)
        <a wire:key="{{ $category->id }}" href="{{ route('downloads.index', $category->slug) }}">
            <div class="min-h-[35px] px-2 py-4 container" style="border-bottom: 1px solid #f5d05e;">
                <p class="text-[15px] font-light" style="color: white;">
                    {{ $category->name }}
                </p>
            </div>
        </a>
    @endforeach
</div>