@extends('layouts.app')

@section('title')
    Home
@endsection

@section('content')
    <div class="">
        {{-- Start Hero Page --}}
        <section class="relative">
            <div class="aspect-video shadow-xl">
                <video autoplay muted loop class="absolute inset-0 w-full h-full object-cover">
                    <source src="/images/upn-profile.mp4" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            </div>
        </section>
        {{-- End Hero Page --}}

        {{-- Start Profil ISR --}}
        <section class="bg-white">
            <div class="px-7 py-8 relative flex items-center flex-row-reverse">
                <div class="absolute justify-center items-center top-0 left-0 ml-5">
                    <div class="w-40 h-14 z-10 bg-[#0D5568]"></div>
                    <div class="w-40 h-14 z-20 bg-[#F5D05E]"></div>
                </div>
                <img src="/images/upn.png" alt="isr-profile" class="flex-shrink-0 w-[658px] h-[578px]">
                <div class="mx-[50px] w-[397px] h-[165px] flex-grow-0">
                    <div class="relative">
                        <h1 class="relative font-bold text-3xl">Profil ISR
                            <span
                                class="after:absolute ml-5 after:w-2/3 after:h-[3px] after:bg-[#0D5568] after:bottom-2"></span>
                        </h1>
                    </div>
                    <p class="mt-[10px] text-[12px]">Interdisciplinary Scientific Research(ISR) merupakan suatu
                        kelompok
                        studi di bidang penalaran dan penelitian di lingkup kampus Universitas Pembangunan Nasional “
                        Veteran” Yogyakarta. Organisasi ini lahir sebagai wujud kontribusi mahasiswa dalam menjujung tinggi
                        Tri Dharma Perguruan Tinggi yaitu pendidikan dan pengajaran, penelitian, dan pengabdian kepada
                        masyarakat serta mendukung visi dan misi UPN “ Veteran” Yogyakarta dalam menyelenggarakan penelitian
                        dan pengabdian kepada masyarakat.</p>
                    <div class="relative flex items-center justify-between flex-row w-[140px] h-[35px] border border-white p-3 mt-3"
                        style="background-color: #0D5568;">
                        <a href="" class="text-white text-[12px]">SELENGKAPNYA</a>
                        <img src="/images/arrow.svg" alt="arrow" class="w-[15px] h-[15px]">
                    </div>
                </div>
                <div class="absolute bottom-0 left-0">
                    <img src="/images/side-decor-bottom-left.png" alt="">
                </div>
            </div>
        </section>
        {{-- End Profil ISR --}}

        {{-- Start Pendaftaran --}}
        <section class="bg-white">
            <div class="relative">
                <div class="absolute w-full h-[170px] bg-[#0D5568] z-0"></div>
                <div class="flex flex-col gap-2 py-10 px-20 w-4/5 mx-auto">
                    <div class="flex justify-between gap-5 w-full h-[180px] z-10">
                        <div class="w-full p-1 border-2 border-[#0D5568] bg-white">
                            <div class="p-3 relative flex items-start flex-row">
                                <img src="/images/oprec.svg" alt="oprec" class="mr-4 w-[35px] h-[35px]">
                                <div class="mr-[50px] flex-grow">
                                    <h1 class="font-bold text-[14px]" style="color:#0D5568">Open Recruitmen ISR</h1>
                                    <p class="mb-0 text-[11px]">Buat kalian yang tertarik belajar dan
                                        menambah
                                        softskill menulis karya ilmiah, penelitian, pengabdian kepada masyarakat, serta
                                        berwirausaha, yuk langsung aja gabung menjadi bagian dari UKM Interdisciplinary
                                        Scientific
                                        Research (ISR)</p>
                                    <div
                                        class="relative flex justify-between flex-row items-center bg-[#0D5568] border border-white w-[135px] h-[35px] p-3 mt-3">
                                        <a href="" class="text-[12px]" style="color: white">SELENGKAPNYA</a>
                                        <img src="/images/arrow.svg" alt="arrow" class="w-[10px] h-[10px]">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="w-full p-1 border-2 border-[#0D5568] bg-white">
                            <div class="p-3 relative flex items-start flex-row">
                                <img src="/images/volunteer.svg" alt="oprec" class="mr-4 w-[35px] h-[35px]">
                                <div class="mr-[50px] flex-grow">
                                    <h1 class="font-bold text-[14px]" style="color:#0D5568">Pendaftaran Volunteer</h1>
                                    <p class="mb-0 text-[11px]">Kalian ingin berkontribusi untuk memajukan
                                        bangsa,
                                        tapi bingung mulai dari mana? Atau ingin mengisi waktumu dengan hal-hal yang
                                        bermanfaat?
                                        Yap
                                        disini tempatnya!</p>
                                    <div
                                        class="relative flex justify-between flex-row items-center bg-[#0D5568] border border-white w-[135px] h-[35px] p-3 mt-3">
                                        <a href="" class="text-[12px]" style="color: white">SELENGKAPNYA</a>
                                        <img src="/images/arrow.svg" alt="arrow" class="w-[10px] h-[10px]">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="flex justify-between gap-5 mt-3 w-full h-[180px]">
                        <div class="w-full p-1 border-2 border-[#0D5568] bg-white">
                            <div class="p-3 relative flex items-start flex-row">
                                <img src="/images/lomba.svg" alt="oprec" class="mr-4 w-[35px] h-[35px]">
                                <div class="mr-[50px] flex-grow">
                                    <h1 class="font-bold text-[14px]" style="color:#0D5568">Pendaftaran Lomba Umum
                                    </h1>
                                    <p class="mb-0 text-[11px]">Kalian ingin berkontribusi untuk memajukan
                                        bangsa,
                                        tapi bingung mulai dari mana? Atau ingin mengisi waktumu dengan hal-hal yang
                                        bermanfaat?
                                        Yap
                                        disini tempatnya!</p>
                                    <div
                                        class="relative flex justify-between flex-row items-center bg-[#0D5568] border border-white w-[135px] h-[35px] p-3 mt-3">
                                        <a href="" class="text-[12px]" style="color: white">SELENGKAPNYA</a>
                                        <img src="/images/arrow.svg" alt="arrow" class="w-[10px] h-[10px]">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="w-full p-1 border-2 border-[#0D5568] bg-white">
                            <div class="p-3 relative flex items-start flex-row">
                                <img src="/images/talenta.svg" alt="oprec" class="mr-4 w-[35px] h-[35px]">
                                <div class="mr-[50px] flex-grow">
                                    <h1 class="font-bold text-[14px]" style="color:#0D5568">Pendaftaran Ajang Talenta
                                        Dikti
                                    </h1>
                                    <p class="mb-0 text-[11px]">Kalian ingin berkontribusi untuk memajukan
                                        bangsa,
                                        tapi bingung mulai dari mana? Atau ingin mengisi waktumu dengan hal-hal yang
                                        bermanfaat?
                                        Yap
                                        disini tempatnya!</p>
                                    <div
                                        class="relative flex justify-between flex-row items-center bg-[#0D5568] border border-white w-[135px] h-[35px] p-3 mt-3">
                                        <a href="" class="text-[12px]" style="color: white">SELENGKAPNYA</a>
                                        <img src="/images/arrow.svg" alt="arrow" class="w-[10px] h-[10px]">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        {{-- End Pendaftaran --}}

        {{-- Start Visi ISR --}}
        <section class="">
            <div class="p-8" style="position: relative; display: flex; align-items: center; flex-direction: row">
                <div class="absolute justify-center items-center top-0 right-0 mr-10">
                    <div class="w-40 h-14 z-10 bg-[#0D5568]"></div>
                    <div class="w-40 h-14 z-20 bg-[#F5D05E]"></div>
                </div>
                <img src="/images/upn.png" alt="isr-profile" class="flex-shrink-0 w-[658px] h-[578px]">
                <div class="mr-8 ml-[50px] w-[400px] h-[120px] flex-grow-0">
                    <div class="relative">
                        <h1 class="font-bold text-3xl relative">Visi ISR
                            <span
                                class="after:absolute ml-5 after:w-2/3 after:h-[3px] after:bg-[#0D5568] after:bottom-3"></span>
                        </h1>
                    </div>
                    <p class="mt-[10px] text-[12px]">Menjadi lembaga penalaran dan penelitian interdisipliner
                        yang mampu mewadahi anggota dalam menghasilkan karya karya yang kreatif, inovatif serta
                        menumbuhkan integritas dan semangat kecendekiaan dalam pengabdian kepada masyarakat.</p>
                    <div class="relative flex items-center justify-between flex-row w-[140px] h-[35px] border border-white p-3 mt-3"
                        style="background-color: #0D5568;">
                        <a href="" class="text-white text-[12px]">SELENGKAPNYA</a>
                        <img src="/images/arrow.svg" alt="arrow" class="w-[15px] h-[15px]">
                    </div>
                </div>
                <div class="absolute bottom-0 right-0">
                    <img src="/images/side-decor-bottom-right.png" alt="">
                </div>
            </div>
        </section>
        {{-- End Visi ISR --}}

        {{-- Start Misi ISR --}}
        <section class="bg-white">
            <div class="p-8 relative flex items-center flex-row-reverse">
                <div class="absolute justify-center items-center top-0 left-0 ml-10">
                    <div class="w-40 h-14 z-10 bg-[#0D5568]"></div>
                    <div class="w-40 h-14 z-20 bg-[#F5D05E]"></div>
                </div>
                <img src="/images/upn.png" alt="isr-profile" class="flex-shrink-0 w-[658px] h-[578px]">
                <div class="mr-8 ml-[50px] w-[400px] h-[120px] flex-grow-0">
                    <div class="relative">
                        <h1 class="font-bold text-3xl relative">Misi ISR
                            <span
                                class="after:absolute ml-5 after:w-2/3 after:h-[3px] after:bg-[#0D5568] after:bottom-3"></span>
                        </h1>
                    </div>
                    <ul class="mt-[10px] text-[12px]">
                        <li>
                            - Melakukan kegiatan pengkajian dan penelitian dengan landasan ilmiah secara interdisipliner.
                        </li>
                        <li>
                            - Melakukan kegiatan pengabdian kepada masyarakat sesuai dengan kompetensi mahasiswa.</li>
                    </ul>
                    <div class="relative flex items-center justify-between flex-row w-[140px] h-[35px] border border-white p-3 mt-3"
                        style="background-color: #0D5568;">
                        <a href="" class="text-white text-[12px]">SELENGKAPNYA</a>
                        <img src="/images/arrow.svg" alt="arrow" class="w-[15px] h-[15px]">
                    </div>
                </div>
                <div class="absolute bottom-0 left-0">
                    <img src="/images/side-decor-bottom-left.png" alt="">
                </div>
            </div>
        </section>
        {{-- End Misi ISR --}}

        {{-- Start Berita Terkini --}}
        <section class="bg-[#F5D05E]">
            <div class="p-8">
                <p class="text-[30px] font-bold text-center" style="color: #0D5568">BERITA TERKINI</p>
                <div class="flex flex-row py-5 gap-6 justify-center">
                    <div
                        class="w-[369px] h-[581px] bg-white border-r-[14px] border-b-[14px] border-r-[#0D5568] border-b-[#0D5568] rounded-[30px] shadow dark:bg-gray-800 dark:border-gray-700">
                        <a href="#" class="flex justify-center">
                            <img class="rounded-xl w-[248px] h-[179px] m-3" src="/images/content.png"
                                alt="berita terkini" />
                        </a>
                        <div class="px-14">
                            <a href="#">
                                <h5 class="mb-2 font-bold uppercase text-gray-900 dark:text-white text-[20px]">UKM ISR UPN
                                    VETERAN YOGYAKARTA LOLOS ABDIDAYA 2021</h5>
                            </a>
                            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400 text-[13px]">Unit Kegiatan
                                Mahasiswa Interdisciplinary Scientific Reserch UPN Veteran Yogyakarta yang dibimbing oleh
                                Bapak Oliver Samuel Simanjuntak, S.Kom., M.Eng. lolos menjadi Abdidaya 2021 sebagai
                                Nominator Lembaga Mitra Desa-Pemerintah Desa Girirejo.</p>
                        </div>
                    </div>
                    <div
                        class="w-[369px] h-[581px] bg-white border-r-[14px] border-b-[14px] border-r-[#0D5568] border-b-[#0D5568] rounded-[30px] shadow dark:bg-gray-800 dark:border-gray-700">
                        <a href="#" class="flex justify-center">
                            <img class="rounded-xl w-[248px] h-[179px] m-3" src="/images/content.png"
                                alt="berita terkini" />
                        </a>
                        <div class="px-14">
                            <a href="#">
                                <h5 class="mb-2 font-bold uppercase text-gray-900 dark:text-white text-[20px]">UKM ISR UPN
                                    VETERAN YOGYAKARTA LOLOS ABDIDAYA 2021</h5>
                            </a>
                            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400 text-[13px]">Unit Kegiatan
                                Mahasiswa Interdisciplinary Scientific Reserch UPN Veteran Yogyakarta yang dibimbing oleh
                                Bapak Oliver Samuel Simanjuntak, S.Kom., M.Eng. lolos menjadi Abdidaya 2021 sebagai
                                Nominator Lembaga Mitra Desa-Pemerintah Desa Girirejo.</p>
                        </div>
                    </div>
                    <div
                        class="w-[369px] h-[581px] bg-white border-r-[14px] border-b-[14px] border-r-[#0D5568] border-b-[#0D5568] rounded-[30px] shadow dark:bg-gray-800 dark:border-gray-700">
                        <a href="#" class="flex justify-center">
                            <img class="rounded-xl w-[248px] h-[179px] m-3" src="/images/content.png"
                                alt="berita terkini" />
                        </a>
                        <div class="px-14">
                            <a href="#">
                                <h5 class="mb-2 font-bold uppercase text-gray-900 dark:text-white text-[20px]">UKM ISR UPN
                                    VETERAN YOGYAKARTA LOLOS ABDIDAYA 2021</h5>
                            </a>
                            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400 text-[13px]">Unit Kegiatan
                                Mahasiswa Interdisciplinary Scientific Reserch UPN Veteran Yogyakarta yang dibimbing oleh
                                Bapak Oliver Samuel Simanjuntak, S.Kom., M.Eng. lolos menjadi Abdidaya 2021 sebagai
                                Nominator Lembaga Mitra Desa-Pemerintah Desa Girirejo.</p>
                        </div>
                    </div>
                </div>
                <div class="flex justify-center mt-3 hover:">
                    <a href="{{ route('berita-terkini') }}"
                        class="bg-[#0D5568] rounded-2xl p-3 hover:scale-110 transition-transform duration-300 text-white text-[15px]">SELENGKAPNYA</a>
                </div>
            </div>
        </section>
        {{-- End Berita Terkini --}}

        {{-- Start Artikel Terkini --}}
        <section class="bg-[#0D5568]">
            <div class="p-8">
                <p class="text-[30px] font-bold text-center" style="color: #F5D05E">ARTIKEL TERKINI</p>
                <div class="flex flex-row py-5 gap-6 justify-center">
                    <div
                        class="w-[369px] h-[581px] bg-white border-r-[14px] border-b-[14px] border-r-[#F5D05E] border-b-[#F5D05E] rounded-[30px] shadow dark:bg-gray-800 dark:border-gray-700">
                        <a href="#" class="flex justify-center">
                            <img class="rounded-xl w-[248px] h-[179px] m-3" src="/images/content.png"
                                alt="berita terkini" />
                        </a>
                        <div class="px-14">
                            <a href="#">
                                <h5 class="mb-2 font-bold uppercase text-gray-900 dark:text-white text-[20px]">UKM ISR UPN
                                    VETERAN YOGYAKARTA LOLOS ABDIDAYA 2021</h5>
                            </a>
                            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400 text-[13px]">Unit Kegiatan
                                Mahasiswa Interdisciplinary Scientific Reserch UPN Veteran Yogyakarta yang dibimbing oleh
                                Bapak Oliver Samuel Simanjuntak, S.Kom., M.Eng. lolos menjadi Abdidaya 2021 sebagai
                                Nominator Lembaga Mitra Desa-Pemerintah Desa Girirejo.</p>
                        </div>
                    </div>
                    <div
                        class="w-[369px] h-[581px] bg-white border-r-[14px] border-b-[14px] border-r-[#F5D05E] border-b-[#F5D05E] rounded-[30px] shadow dark:bg-gray-800 dark:border-gray-700">
                        <a href="#" class="flex justify-center">
                            <img class="rounded-xl w-[248px] h-[179px] m-3" src="/images/content.png"
                                alt="berita terkini" />
                        </a>
                        <div class="px-14">
                            <a href="#">
                                <h5 class="mb-2 font-bold uppercase text-gray-900 dark:text-white text-[20px]">UKM ISR UPN
                                    VETERAN YOGYAKARTA LOLOS ABDIDAYA 2021</h5>
                            </a>
                            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400 text-[13px]">Unit Kegiatan
                                Mahasiswa Interdisciplinary Scientific Reserch UPN Veteran Yogyakarta yang dibimbing oleh
                                Bapak Oliver Samuel Simanjuntak, S.Kom., M.Eng. lolos menjadi Abdidaya 2021 sebagai
                                Nominator Lembaga Mitra Desa-Pemerintah Desa Girirejo.</p>
                        </div>
                    </div>
                    <div
                        class="w-[369px] h-[581px] bg-white border-r-[14px] border-b-[14px] border-r-[#F5D05E] border-b-[#F5D05E] rounded-[30px] shadow dark:bg-gray-800 dark:border-gray-700">
                        <a href="#" class="flex justify-center">
                            <img class="rounded-xl w-[248px] h-[179px] m-3" src="/images/content.png"
                                alt="berita terkini" />
                        </a>
                        <div class="px-14">
                            <a href="#">
                                <h5 class="mb-2 font-bold uppercase text-gray-900 dark:text-white text-[20px]">UKM ISR UPN
                                    VETERAN YOGYAKARTA LOLOS ABDIDAYA 2021</h5>
                            </a>
                            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400 text-[13px]">Unit Kegiatan
                                Mahasiswa Interdisciplinary Scientific Reserch UPN Veteran Yogyakarta yang dibimbing oleh
                                Bapak Oliver Samuel Simanjuntak, S.Kom., M.Eng. lolos menjadi Abdidaya 2021 sebagai
                                Nominator Lembaga Mitra Desa-Pemerintah Desa Girirejo.</p>
                        </div>
                    </div>
                </div>
                <div class="flex justify-center mt-3 hover:">
                    <a href="{{ route('artikel-terkini') }}"
                        class="bg-[#F5D05E] rounded-2xl p-3 hover:scale-110 transition-transform duration-300 text-white text-[15px]">SELENGKAPNYA</a>
                </div>
            </div>
        </section>
        {{-- End Artikel Terkini --}}

        {{-- Start Mini Blog --}}
        <section class="bg-[#F5D05E]">
            <div class="p-8">
                <p class="text-[30px] font-bold text-center" style="color: #0D5568">MINI BLOG</p>
                <div class="flex flex-row py-5 gap-6 justify-center">
                    <div
                        class="w-[369px] h-[581px] bg-white border-r-[14px] border-b-[14px] border-r-[#0D5568] border-b-[#0D5568] rounded-[30px] shadow dark:bg-gray-800 dark:border-gray-700">
                        <a href="#" class="flex justify-center">
                            <img class="rounded-xl w-[248px] h-[179px] m-3" src="/images/content.png"
                                alt="berita terkini" />
                        </a>
                        <div class="px-14">
                            <a href="#">
                                <h5 class="mb-2 font-bold uppercase text-gray-900 dark:text-white text-[20px]">UKM ISR UPN
                                    VETERAN YOGYAKARTA LOLOS ABDIDAYA 2021</h5>
                            </a>
                            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400 text-[13px]">Unit Kegiatan
                                Mahasiswa Interdisciplinary Scientific Reserch UPN Veteran Yogyakarta yang dibimbing oleh
                                Bapak Oliver Samuel Simanjuntak, S.Kom., M.Eng. lolos menjadi Abdidaya 2021 sebagai
                                Nominator Lembaga Mitra Desa-Pemerintah Desa Girirejo.</p>
                        </div>
                    </div>
                    <div
                        class="w-[369px] h-[581px] bg-white border-r-[14px] border-b-[14px] border-r-[#0D5568] border-b-[#0D5568] rounded-[30px] shadow dark:bg-gray-800 dark:border-gray-700">
                        <a href="#" class="flex justify-center">
                            <img class="rounded-xl w-[248px] h-[179px] m-3" src="/images/content.png"
                                alt="berita terkini" />
                        </a>
                        <div class="px-14">
                            <a href="#">
                                <h5 class="mb-2 font-bold uppercase text-gray-900 dark:text-white text-[20px]">UKM ISR UPN
                                    VETERAN YOGYAKARTA LOLOS ABDIDAYA 2021</h5>
                            </a>
                            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400 text-[13px]">Unit Kegiatan
                                Mahasiswa Interdisciplinary Scientific Reserch UPN Veteran Yogyakarta yang dibimbing oleh
                                Bapak Oliver Samuel Simanjuntak, S.Kom., M.Eng. lolos menjadi Abdidaya 2021 sebagai
                                Nominator Lembaga Mitra Desa-Pemerintah Desa Girirejo.</p>
                        </div>
                    </div>
                    <div
                        class="w-[369px] h-[581px] bg-white border-r-[14px] border-b-[14px] border-r-[#0D5568] border-b-[#0D5568] rounded-[30px] shadow dark:bg-gray-800 dark:border-gray-700">
                        <a href="#" class="flex justify-center">
                            <img class="rounded-xl w-[248px] h-[179px] m-3" src="/images/content.png"
                                alt="berita terkini" />
                        </a>
                        <div class="px-14">
                            <a href="#">
                                <h5 class="mb-2 font-bold uppercase text-gray-900 dark:text-white text-[20px]">UKM ISR UPN
                                    VETERAN YOGYAKARTA LOLOS ABDIDAYA 2021</h5>
                            </a>
                            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400 text-[13px]">Unit Kegiatan
                                Mahasiswa Interdisciplinary Scientific Reserch UPN Veteran Yogyakarta yang dibimbing oleh
                                Bapak Oliver Samuel Simanjuntak, S.Kom., M.Eng. lolos menjadi Abdidaya 2021 sebagai
                                Nominator Lembaga Mitra Desa-Pemerintah Desa Girirejo.</p>
                        </div>
                    </div>
                </div>
                <div class="flex justify-center mt-3 hover:">
                    <a href="{{ route('mini-blog') }}"
                        class="bg-[#0D5568] rounded-2xl p-3 hover:scale-110 transition-transform duration-300 text-white text-[15px]">SELENGKAPNYA</a>
                </div>
            </div>
        </section>
        {{-- End Mini Blog --}}

        {{-- Start Kegiatan --}}
        <section>
            <div class="flex flex-col p-0 w-full mx-auto">
                <div class="flex justify-between w-full h-[400px]">
                    <div class="w-full">
                        <img src="/images/kegiatan.png" alt="" class="h-full object-cover object-center">
                    </div>
                    <div class="w-full flex items-center justify-center bg-[#0D5568]">
                        <div class="flex-col">
                            <p class="font-bold text-[20px]" style="color: #F5D05E">Kegiatan 1</p>
                            <p class="text-[15px]" style="color: #F5D05E">Penjelasan kegiatan beberapa kata sampai satu
                                paragraf</p>
                        </div>
                    </div>
                </div>
                <div class="flex justify-between w-full h-[400px]">
                    <div class="w-full flex items-center justify-center bg-[#F5D05E]">
                        <div class="flex-col">
                            <p class="font-bold text-[20px]" style="color: #0D5568">Kegiatan 2</p>
                            <p class="text-[15px]" style="color: #0D5568">Penjelasan kegiatan beberapa kata sampai satu
                                paragraf</p>
                        </div>
                    </div>
                    <div class="w-full">
                        <img src="/images/kegiatan.png" alt="" class="h-full object-cover object-center">
                    </div>
                </div>
            </div>
        </section>
        {{-- End Kegiatan --}}

        {{-- Start Pengumuman --}}
        <section class="bg-white">
            <div class="relative pt-12 px-14 w-full h-[700px]">
                <div class="absolute top-0 left-0">
                    <img src="/images/side-decor-top-left.png" alt="">
                </div>
                <div class="ml-40 mt-24 relative">
                    <h1 class="relative font-bold text-2xl">PENGUMUMAN
                        <span
                            class="after:absolute ml-5 after:w-[78%] after:h-[3px] after:bg-[#0D5568] after:bottom-2"></span>
                    </h1>
                </div>
                <div class="ml-40 flex flex-col gap-2 w-5/6">
                    <div class="flex justify-between gap-[100px] w-full pt-3 h-[130px]">
                        <div class="w-full p-1 border-b-2 border-[#0D5568]">
                            <div class="p-3 relative flex items-start flex-row">
                                <div class="mr-[50px] flex-grow">
                                    <h1 class="font-bold text-[16px]" style="color:gray">09 / 12 / 2021</h1>
                                    <p class="mb-0 text-[16px] font-bold">Rapat Anggota ISR Masa Jabatan 2024/2025 Pada
                                        Tanggal 07 Maret 2024</p>
                                </div>
                            </div>
                        </div>
                        <div class="w-full p-1 border-b-2 border-[#0D5568]">
                            <div class="p-3 relative flex items-start flex-row">
                                <div class="mr-[50px] flex-grow">
                                    <h1 class="font-bold text-[16px]" style="color:gray">09 / 12 / 2021</h1>
                                    <p class="mb-0 text-[16px] font-bold">Rapat Anggota ISR Masa Jabatan 2024/2025 Pada
                                        Tanggal 07 Maret 2024</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="flex justify-between gap-[100px] w-full h-[130px]">
                        <div class="w-full p-1 border-b-2 border-[#0D5568]">
                            <div class="p-3 relative flex items-start flex-row">
                                <div class="mr-[50px] flex-grow">
                                    <h1 class="font-bold text-[16px]" style="color:gray">09 / 12 / 2021</h1>
                                    <p class="mb-0 text-[16px] font-bold">Rapat Anggota ISR Masa Jabatan 2024/2025 Pada
                                        Tanggal 07 Maret 2024</p>
                                </div>
                            </div>
                        </div>
                        <div class="w-full p-1 border-b-2 border-[#0D5568]">
                            <div class="p-3 relative flex items-start flex-row">
                                <div class="mr-[50px] flex-grow">
                                    <h1 class="font-bold text-[16px]" style="color:gray">09 / 12 / 2021</h1>
                                    <p class="mb-0 text-[16px] font-bold">Rapat Anggota ISR Masa Jabatan 2024/2025 Pada
                                        Tanggal 07 Maret 2024</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div
                    class="ml-40 w-[300px] h-[20px] relative flex justify-between items-center flex-row border-b-2 border-b-[#0D5568] p-3 mt-16">
                    <a href="" class="font-bold" style="color: #0D5568;">LIHAT PENGUMUMAN LAINNYA</a>
                    <img src="/images/panah.svg" alt="arrow" class="w-[15px] h-[15px]">
                </div>
                <div class="absolute bottom-0 right-0">
                    <img src="/images/side-decor-bottom-right.png" alt="">
                </div>
            </div>
        </section>
        {{-- End Pengumuman --}}
    </div>
@endsection