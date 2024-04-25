@extends('layouts.app')

@section('title', $download->title)

@section('content')
    <div class="px-20 py-28 bg-white">
        <div class="flex flex-row gap-10">
            <div class="md:w-3/7 flex py-3 flex-col">
                <div class="container bg-[#0D5568] px-5 pt-4 pb-10">
                    <div class="flex justify-center pb-2">
                        <p class="text-[25px] font-bold" style="color: white;">
                            DOWNLOAD
                        </p>
                    </div>
                    <a href="#">
                        <div class="min-h-[35px] px-2 py-4 container" style="border-bottom: 1px solid #f5d05e;">
                            <p class="text-[15px] font-light" style="color: white;">
                                SOP Media Partner
                            </p>
                        </div>
                    </a>
                    <a href="#">
                        <div class="min-h-[35px] px-2 py-4 container" style="border-bottom: 1px solid #f5d05e;">
                            <p class="text-[15px] font-light" style="color: white;">
                                SOP Publikasi
                            </p>
                        </div>
                    </a>
                    <a href="#">
                        <div class="min-h-[35px] px-2 py-4 container" style="border-bottom: 1px solid #f5d05e;">
                            <p class="text-[15px] font-light" style="color: white;">
                                SOP Kesekertariatan
                            </p>
                        </div>
                    </a>
                    <a href="#">
                        <div class="min-h-[35px] px-2 py-4 container" style="border-bottom: 1px solid #f5d05e;">
                            <p class="text-[15px] font-light" style="color: white;">
                                Asset ISR
                            </p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="flex flex-col md:w-4/7">
                <div class="bg-white px-4">
                    @foreach ($download->content as $downloads)
                        @if ($downloads['type'] === 'heading')
                            <div class="py-3">
                                <p class="text-[25px] font-black">{!! $downloads['data']['content'] !!}</p>
                            </div>
                        @elseif ($downloads['type'] === 'image')
                            <div class="flex justify-center">
                                <img src="{{ asset('storage/' . $downloads['data']['url']) }}"
                                    alt="{{ $downloads['data']['alt'] }}" class="mb-4">
                            </div>
                        @elseif ($downloads['type'] === 'paragraph')
                            <div class="py-3">
                                <p>{!! $downloads['data']['content'] !!}</p>
                            </div>
                        @elseif ($downloads['type'] === 'attachments')
                            <div class="py-5">
                                <div class="py-5">
                                    <div
                                        class="container mx-auto w-2/4 bg-gray-200 max-h-[250px] min-w-64 border border-gray-400">
                                        <div class="md:h-4/5 flex justify-center">
                                            <iframe
                                                src="{{ asset('storage/' . $downloads['data']['url'][0]) }}#page=1&view=fitH"
                                                alt="fileIcon" style="width: 75%; height: auto;"></iframe>
                                        </div>
                                        <div class="container md:h-1/5 bg-white px-2 py-2 mx-auto my-auto min-h-[50px]">
                                            <div class="flex flex-row justify-between">
                                                <div class="px-1 flex flex-row max-h-[25px]">
                                                    <img src="https://icons.veryicon.com/png/o/internet--web/flatten-icon/file-76.png"
                                                        alt="fileIcon" width="25" height="25">
                                                    <p class="text-lg font-bold">{{ $downloads['data']['desc'] }}</p>
                                                </div>
                                                <a href="{{ asset('storage/' . $downloads['data']['url'][0]) }}">
                                                    <img src="https://icons.veryicon.com/png/o/miscellaneous/general-icon-12/download-download-3.png"
                                                        alt="fileIcon" width="25" height="25">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        @endif
                    @endforeach
                    <div class="flex flex-row pt-20 w-full justify-between">
                        <div class="md:w-1/2 flex flex-row">
                            <div class="pr-3 my-auto">
                                <img src="https://icons.veryicon.com/png/o/system/foundation-icon/back-20.png"
                                    alt="fileIcon" width="25" height="25">
                            </div>
                            <a href="#">
                                <div class="flex-col">
                                    <p class="text-[20px] font-bold" style="color: gray;">
                                        SEBELUMNYA
                                    </p>
                                    <p class="text-[20px]" style="color: gray;">
                                        Logo ISR
                                    </p>
                                </div>
                            </a>
                        </div>
                        <div class="md:w-1/2 flex flex-row justify-end">
                            <a href="#">
                                <div class="flex-col">
                                    <p class="text-[20px] font-bold" style="color: gray;">
                                        SELANJUTNYA
                                    </p>
                                    <p class="text-[20px]" style="color: gray;">
                                        Logo ISR
                                    </p>
                                </div>
                            </a>
                            <div class="pl-3 my-auto">
                                <img src="https://icons.veryicon.com/png/o/system/foundation-icon/next-14.png"
                                    alt="fileIcon" width="25" height="25">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
@endsection
