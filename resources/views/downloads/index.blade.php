@extends("layouts.app")

@section("title", "Download Asset ISR")

@section('content')
    <div class="px-2 md:px-20 py-28 bg-white">
        <div class="flex flex-row gap-10">
            <div class="lg:w-1/3 py-3 flex-col hidden lg:flex">
                    <livewire:side-navigation-download>
            </div>
            <div class="flex flex-col w-full lg:w-2/3">
                <div class="pb-5">
                    <div class="flex w-full border-b-2 border-b-[#0D5568] p-3">
                        <p class="text-xl font-bold">DOWNLOAD ASSET ISR</p>
                    </div>
                </div>
                <div class="bg-white px-0 md:px-4">
                    <div class="flex flex-col gap-4">
                        @foreach ($downloads as $item)
                            <a href="{{ route('downloads.show', ['category' => $category->slug, 'download' => $item->slug]) }}">
                                <div class="flex flex-col gap-2"
                                    style="border: 1px solid #0D5568; border-radius: 8px; padding: 7px;">
                                    <div class="px-3">
                                        <p class="text-xl font-semibold pb-3">{{ $item->title }}</p>
                                        <div class="flex flex-row gap-1 md:gap-7">
                                            <div class="flex flex-row gap-1 md:gap-2">
                                                <div class="h-3 w-3 md:h-4 md:w-4">
                                                    <img src="/images/profileIcon.svg" alt="user">
                                                </div>
                                                <p class="text-[9px] md:text-sm">Oleh: {{ $item->user->name }}</p>
                                            </div>
                                            <div class="flex flex-row gap-1 md:gap-2">
                                                <div class="h-3 w-3 md:h-4 md:w-4">
                                                    <img src="/images/clockIcon.svg" alt="jam">
                                                </div>
                                                <p class="text-[9px] md:text-sm">
                                                    {{ \Carbon\Carbon::parse($item->published_at)->format('d F Y, H:i') }}
                                                </p>
                                            </div>
                                            <div class="flex flex-row gap-1 md:gap-2">
                                                <div class="h-3 w-3 md:h-4 md:w-4">
                                                    <img src="/images/attachmentIcon.svg" alt="file">
                                                </div>
                                                <p class="text-[9px] md:text-sm">
                                                    @php
                                                        $attachmentCount = 0;
                                                        foreach ($item->content as $content) {
                                                            if (
                                                                isset($content["type"]) &&
                                                                $content["type"] === "attachments"
                                                            ) {
                                                                $attachmentCount++;
                                                            }
                                                        }
                                                    @endphp

                                                    @if ($attachmentCount > 0)
                                                        {{ $attachmentCount }}
                                                        {{ $attachmentCount > 1 ? 'Lampiran Tersedia' : 'Lampiran Tersedia' }}
                                                    @else
                                                            No Attachment
                                                    @endif
                                                </p>
                                            </div>
                                        </div>
                                        <div class="py-3 hidden md:block">
                                            <hr style="border-color: #000000; border-width: 1/2px;">
                                        </div>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
                <div class="my-3 pt-10">
                    {{ $downloads->onEachSide(1)->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
