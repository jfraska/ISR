@extends("layouts.app")

@section("title", "Download Asset ISR")

@section("content")
    <div class="bg-white px-20 py-28">
        <div class="flex flex-row gap-10">
            <div class="flex flex-col py-3 md:w-1/3">
                <div class="container bg-[#0D5568] px-5 pb-10 pt-4">
                    <div class="flex justify-center pb-2">
                        <p class="text-[25px] font-bold" style="color: white">
                            DOWNLOAD
                        </p>
                    </div>
                    <a href="#">
                        <div
                            class="container min-h-[35px] px-2 py-4"
                            style="border-bottom: 1px solid #f5d05e"
                        >
                            <p
                                class="text-[15px] font-light"
                                style="color: white"
                            >
                                SOP Media Partner
                            </p>
                        </div>
                    </a>
                    <a href="#">
                        <div
                            class="container min-h-[35px] px-2 py-4"
                            style="border-bottom: 1px solid #f5d05e"
                        >
                            <p
                                class="text-[15px] font-light"
                                style="color: white"
                            >
                                SOP Publikasi
                            </p>
                        </div>
                    </a>
                    <a href="#">
                        <div
                            class="container min-h-[35px] px-2 py-4"
                            style="border-bottom: 1px solid #f5d05e"
                        >
                            <p
                                class="text-[15px] font-light"
                                style="color: white"
                            >
                                SOP Kesekertariatan
                            </p>
                        </div>
                    </a>
                    <a href="#">
                        <div
                            class="container min-h-[35px] px-2 py-4"
                            style="border-bottom: 1px solid #f5d05e"
                        >
                            <p
                                class="text-[15px] font-light"
                                style="color: white"
                            >
                                Asset ISR
                            </p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="flex flex-col md:w-2/3">
                <div class="pb-5">
                    <div class="flex w-full border-b-2 border-b-[#0D5568] p-3">
                        <p class="text-xl font-bold">DOWNLOAD ASSET ISR</p>
                    </div>
                </div>
                <div class="bg-white px-4">
                    <div class="flex flex-col gap-4">
                        @foreach ($download as $item)
                            <a
                                href="{{ route("downloads.show", $item->slug) }}"
                            >
                                <div
                                    class="flex flex-col gap-2"
                                    style="
                                        border: 1px solid #0d5568;
                                        border-radius: 8px;
                                        padding: 7px;
                                    "
                                >
                                    <div class="px-3">
                                        <p class="text-xl font-bold">
                                            {{ $item->title }}
                                        </p>
                                        <div class="flex flex-row gap-7">
                                            <div class="flex flex-row gap-2">
                                                <div class="h-4 w-4">
                                                    <img
                                                        src="/images/profileIcon.svg"
                                                        alt="user"
                                                    />
                                                </div>
                                                <p class="text-sm">
                                                    Oleh:
                                                    {{ $item->user->name }}
                                                </p>
                                            </div>
                                            <div class="flex flex-row gap-2">
                                                <div class="h-4 w-4">
                                                    <img
                                                        src="/images/clockIcon.svg"
                                                        alt="jam"
                                                    />
                                                </div>
                                                <p class="text-sm">
                                                    {{ \Carbon\Carbon::parse($item->published_at)->format("d F Y, H:i") }}
                                                </p>
                                            </div>
                                            <div class="flex flex-row gap-2">
                                                <div class="h-4 w-4">
                                                    <img
                                                        src="/images/attachmentIcon.svg"
                                                        alt="file"
                                                    />
                                                </div>
                                                <p class="text-sm">
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
                                                        {{ $attachmentCount > 1 ? "Attachments Available" : "Attachment Available" }}
                                                    @else
                                                            No Attachment
                                                    @endif
                                                </p>
                                            </div>
                                        </div>
                                        <div class="py-3">
                                            <hr
                                                style="
                                                    border-color: #000000;
                                                    border-width: 1/2px;
                                                "
                                            />
                                        </div>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
