@extends("layouts.app")

@section("title")
    Home
@endsection

@section("content")
    <div class="">
        {{-- Start Hero Page --}}
        <section class="relative aspect-video w-full">
            <video autoplay muted loop class="h-full w-full object-cover">
                <source src="/images/upn-profile.mp4" type="video/mp4" />
                Your browser does not support the video tag.
            </video>
        </section>
        {{-- End Hero Page --}}

        {{-- Start Profil ISR --}}
        <section class="bg-white">
            <div
                class="relative flex w-full flex-col-reverse items-center justify-end gap-10 px-8 py-8 md:flex-row md:gap-20"
            >
                <div
                    class="absolute left-4 top-4 hidden items-center justify-center md:block"
                >
                    <div class="z-10 h-14 w-40 bg-[#0D5568]"></div>
                    <div class="z-20 h-14 w-40 bg-[#7e7e7d]"></div>
                </div>
                <div class="w-full md:w-[397px]">
                    <h1 class="relative w-full text-3xl font-bold">
                        Profil ISR
                        <span
                            class="ml-5 after:absolute after:bottom-2 after:h-[3px] after:w-1/3 after:bg-[#0D5568]"
                        ></span>
                    </h1>
                    <p class="mt-[10px] text-[12px]">
                        Interdisciplinary Scientific Research(ISR) merupakan
                        suatu kelompok studi di bidang penalaran dan penelitian
                        di lingkup kampus Universitas Pembangunan Nasional “
                        Veteran” Yogyakarta. Organisasi ini lahir sebagai wujud
                        kontribusi mahasiswa dalam menjujung tinggi Tri Dharma
                        Perguruan Tinggi yaitu pendidikan dan pengajaran,
                        penelitian, dan pengabdian kepada masyarakat serta
                        mendukung visi dan misi UPN “ Veteran” Yogyakarta dalam
                        menyelenggarakan penelitian dan pengabdian kepada
                        masyarakat.
                    </p>
                    <div
                        class="relative mt-3 flex w-fit items-center gap-5 border border-white bg-[#0D5568] p-3"
                    >
                        <a href="" class="text-[12px] text-white">
                            SELENGKAPNYA
                        </a>
                        <img
                            src="/images/arrow.svg"
                            alt="arrow"
                            class="aspect-square w-4"
                        />
                    </div>
                </div>
                <img
                    src="/images/upn.png"
                    alt="isr-profile"
                    class="aspect-square w-full md:w-[658px]"
                />
                <div class="absolute bottom-0 left-0 hidden md:block">
                    <img
                        src="/images/side-decor-bottom-left.png"
                        alt=""
                        class="aspect-square w-[20vw]"
                    />
                </div>
            </div>
        </section>
        {{-- End Profil ISR --}}

        {{-- Start Pendaftaran --}}
        <section class="relative bg-white py-10">
            <div
                class="absolute inset-x-0 top-0 z-0 hidden h-[170px] w-full bg-[#0D5568] md:block"
            ></div>
            <div
                class="mx-auto flex w-full flex-row gap-5 overflow-x-auto md:w-4/5 md:flex-col"
            >
                <div class="z-10 flex h-[300px] gap-5 md:h-[180px]">
                    <div
                        class="flex w-full items-start gap-2 border-2 border-[#0D5568] bg-white p-4"
                    >
                        <img
                            src="/images/oprec.svg"
                            alt="oprec"
                            class="aspect-square w-9"
                        />
                        <div class="mr-[50px]">
                            <h1 class="text-sm font-bold text-[#0D5568]">
                                Open Recruitmen ISR
                            </h1>
                            <p class="text-xs">
                                Buat kalian yang tertarik belajar dan menambah
                                softskill menulis karya ilmiah, penelitian,
                                pengabdian kepada masyarakat, serta
                                berwirausaha, yuk langsung aja gabung menjadi
                                bagian dari UKM Interdisciplinary Scientific
                                Research (ISR)
                            </p>
                            <div
                                class="mt-3 flex h-[35px] w-[135px] items-center justify-between border border-white bg-[#0D5568] p-3"
                            >
                                <a
                                    href=""
                                    class="text-[12px]"
                                    style="color: white"
                                >
                                    SELENGKAPNYA
                                </a>
                                <img
                                    src="/images/arrow.svg"
                                    alt="arrow"
                                    class="h-[10px] w-[10px]"
                                />
                            </div>
                        </div>
                    </div>
                    <div class="w-full border-2 border-[#0D5568] bg-white p-1">
                        <div class="relative flex flex-row items-start p-3">
                            <img
                                src="/images/volunteer.svg"
                                alt="oprec"
                                class="mr-4 h-[35px] w-[35px]"
                            />
                            <div class="mr-[50px]">
                                <h1
                                    class="text-[14px] font-bold"
                                    style="color: #0d5568"
                                >
                                    Pendaftaran Volunteer
                                </h1>
                                <p class="mb-0 text-[11px]">
                                    Kalian ingin berkontribusi untuk memajukan
                                    bangsa, tapi bingung mulai dari mana? Atau
                                    ingin mengisi waktumu dengan hal-hal yang
                                    bermanfaat? Yap disini tempatnya!
                                </p>
                                <div
                                    class="relative mt-3 flex h-[35px] w-[135px] flex-row items-center justify-between border border-white bg-[#0D5568] p-3"
                                >
                                    <a
                                        href=""
                                        class="text-[12px]"
                                        style="color: white"
                                    >
                                        SELENGKAPNYA
                                    </a>
                                    <img
                                        src="/images/arrow.svg"
                                        alt="arrow"
                                        class="h-[10px] w-[10px]"
                                    />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex h-[300px] gap-5 md:h-[180px]">
                    <div class="w-full border-2 border-[#0D5568] bg-white p-1">
                        <div class="relative flex flex-row items-start p-3">
                            <img
                                src="/images/lomba.svg"
                                alt="oprec"
                                class="mr-4 h-[35px] w-[35px]"
                            />
                            <div class="mr-[50px] flex-grow">
                                <h1
                                    class="text-[14px] font-bold"
                                    style="color: #0d5568"
                                >
                                    Pendaftaran Lomba Umum
                                </h1>
                                <p class="mb-0 text-[11px]">
                                    Kalian ingin berkontribusi untuk memajukan
                                    bangsa, tapi bingung mulai dari mana? Atau
                                    ingin mengisi waktumu dengan hal-hal yang
                                    bermanfaat? Yap disini tempatnya!
                                </p>
                                <div
                                    class="relative mt-3 flex h-[35px] w-[135px] flex-row items-center justify-between border border-white bg-[#0D5568] p-3"
                                >
                                    <a
                                        href=""
                                        class="text-[12px]"
                                        style="color: white"
                                    >
                                        SELENGKAPNYA
                                    </a>
                                    <img
                                        src="/images/arrow.svg"
                                        alt="arrow"
                                        class="h-[10px] w-[10px]"
                                    />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="w-full border-2 border-[#0D5568] bg-white p-1">
                        <div class="relative flex flex-row items-start p-3">
                            <img
                                src="/images/talenta.svg"
                                alt="oprec"
                                class="mr-4 h-[35px] w-[35px]"
                            />
                            <div class="mr-[50px] flex-grow">
                                <h1
                                    class="text-[14px] font-bold"
                                    style="color: #0d5568"
                                >
                                    Pendaftaran Ajang Talenta Dikti
                                </h1>
                                <p class="mb-0 text-[11px]">
                                    Kalian ingin berkontribusi untuk memajukan
                                    bangsa, tapi bingung mulai dari mana? Atau
                                    ingin mengisi waktumu dengan hal-hal yang
                                    bermanfaat? Yap disini tempatnya!
                                </p>
                                <div
                                    class="relative mt-3 flex h-[35px] w-[135px] flex-row items-center justify-between border border-white bg-[#0D5568] p-3"
                                >
                                    <a
                                        href=""
                                        class="text-[12px]"
                                        style="color: white"
                                    >
                                        SELENGKAPNYA
                                    </a>
                                    <img
                                        src="/images/arrow.svg"
                                        alt="arrow"
                                        class="h-[10px] w-[10px]"
                                    />
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
            <div
                class="p-8"
                style="
                    position: relative;
                    display: flex;
                    align-items: center;
                    flex-direction: row;
                "
            >
                <div
                    class="absolute right-0 top-0 mr-10 items-center justify-center"
                >
                    <div class="z-10 h-14 w-40 bg-[#0D5568]"></div>
                    <div class="z-20 h-14 w-40 bg-[#F5D05E]"></div>
                </div>
                <img
                    src="/images/upn.png"
                    alt="isr-profile"
                    class="h-[578px] w-[658px] flex-shrink-0"
                />
                <div class="ml-[50px] mr-8 h-[120px] w-[400px] flex-grow-0">
                    <div class="relative">
                        <h1 class="relative text-3xl font-bold">
                            Visi ISR
                            <span
                                class="ml-5 after:absolute after:bottom-3 after:h-[3px] after:w-2/3 after:bg-[#0D5568]"
                            ></span>
                        </h1>
                    </div>
                    <p class="mt-[10px] text-[12px]">
                        Menjadi lembaga penalaran dan penelitian interdisipliner
                        yang mampu mewadahi anggota dalam menghasilkan karya
                        karya yang kreatif, inovatif serta menumbuhkan
                        integritas dan semangat kecendekiaan dalam pengabdian
                        kepada masyarakat.
                    </p>
                    <div
                        class="relative mt-3 flex h-[35px] w-[140px] flex-row items-center justify-between border border-white p-3"
                        style="background-color: #0d5568"
                    >
                        <a href="" class="text-[12px] text-white">
                            SELENGKAPNYA
                        </a>
                        <img
                            src="/images/arrow.svg"
                            alt="arrow"
                            class="h-[15px] w-[15px]"
                        />
                    </div>
                </div>
                <div class="absolute bottom-0 right-0">
                    <img src="/images/side-decor-bottom-right.png" alt="" />
                </div>
            </div>
        </section>
        {{-- End Visi ISR --}}

        {{-- Start Misi ISR --}}
        <section class="bg-white">
            <div class="relative flex flex-row-reverse items-center p-8">
                <div
                    class="absolute left-0 top-0 ml-10 items-center justify-center"
                >
                    <div class="z-10 h-14 w-40 bg-[#0D5568]"></div>
                    <div class="z-20 h-14 w-40 bg-[#F5D05E]"></div>
                </div>
                <img
                    src="/images/upn.png"
                    alt="isr-profile"
                    class="h-[578px] w-[658px] flex-shrink-0"
                />
                <div class="ml-[50px] mr-8 h-[120px] w-[400px] flex-grow-0">
                    <div class="relative">
                        <h1 class="relative text-3xl font-bold">
                            Misi ISR
                            <span
                                class="ml-5 after:absolute after:bottom-3 after:h-[3px] after:w-2/3 after:bg-[#0D5568]"
                            ></span>
                        </h1>
                    </div>
                    <ul class="mt-[10px] text-[12px]">
                        <li>
                            - Melakukan kegiatan pengkajian dan penelitian
                            dengan landasan ilmiah secara interdisipliner.
                        </li>
                        <li>
                            - Melakukan kegiatan pengabdian kepada masyarakat
                            sesuai dengan kompetensi mahasiswa.
                        </li>
                    </ul>
                    <div
                        class="relative mt-3 flex h-[35px] w-[140px] flex-row items-center justify-between border border-white p-3"
                        style="background-color: #0d5568"
                    >
                        <a href="" class="text-[12px] text-white">
                            SELENGKAPNYA
                        </a>
                        <img
                            src="/images/arrow.svg"
                            alt="arrow"
                            class="h-[15px] w-[15px]"
                        />
                    </div>
                </div>
                <div class="absolute bottom-0 left-0">
                    <img src="/images/side-decor-bottom-left.png" alt="" />
                </div>
            </div>
        </section>
        {{-- End Misi ISR --}}

        {{-- Start Berita Terkini --}}
        <section class="bg-[#F5D05E]">
            <div class="p-8">
                <p
                    class="text-center text-[30px] font-bold"
                    style="color: #0d5568"
                >
                    BERITA TERKINI
                </p>
                <div class="flex flex-row justify-center gap-6 py-5">
                    <div
                        class="h-[581px] w-[369px] rounded-[30px] border-b-[14px] border-r-[14px] border-b-[#0D5568] border-r-[#0D5568] bg-white shadow dark:border-gray-700 dark:bg-gray-800"
                    >
                        <a href="#" class="flex justify-center">
                            <img
                                class="m-3 h-[179px] w-[248px] rounded-xl"
                                src="/images/content.png"
                                alt="berita terkini"
                            />
                        </a>
                        <div class="px-14">
                            <a href="#">
                                <h5
                                    class="mb-2 text-[20px] font-bold uppercase text-gray-900 dark:text-white"
                                >
                                    UKM ISR UPN VETERAN YOGYAKARTA LOLOS
                                    ABDIDAYA 2021
                                </h5>
                            </a>
                            <p
                                class="mb-3 text-[13px] font-normal text-gray-700 dark:text-gray-400"
                            >
                                Unit Kegiatan Mahasiswa Interdisciplinary
                                Scientific Reserch UPN Veteran Yogyakarta yang
                                dibimbing oleh Bapak Oliver Samuel Simanjuntak,
                                S.Kom., M.Eng. lolos menjadi Abdidaya 2021
                                sebagai Nominator Lembaga Mitra Desa-Pemerintah
                                Desa Girirejo.
                            </p>
                        </div>
                    </div>
                    <div
                        class="h-[581px] w-[369px] rounded-[30px] border-b-[14px] border-r-[14px] border-b-[#0D5568] border-r-[#0D5568] bg-white shadow dark:border-gray-700 dark:bg-gray-800"
                    >
                        <a href="#" class="flex justify-center">
                            <img
                                class="m-3 h-[179px] w-[248px] rounded-xl"
                                src="/images/content.png"
                                alt="berita terkini"
                            />
                        </a>
                        <div class="px-14">
                            <a href="#">
                                <h5
                                    class="mb-2 text-[20px] font-bold uppercase text-gray-900 dark:text-white"
                                >
                                    UKM ISR UPN VETERAN YOGYAKARTA LOLOS
                                    ABDIDAYA 2021
                                </h5>
                            </a>
                            <p
                                class="mb-3 text-[13px] font-normal text-gray-700 dark:text-gray-400"
                            >
                                Unit Kegiatan Mahasiswa Interdisciplinary
                                Scientific Reserch UPN Veteran Yogyakarta yang
                                dibimbing oleh Bapak Oliver Samuel Simanjuntak,
                                S.Kom., M.Eng. lolos menjadi Abdidaya 2021
                                sebagai Nominator Lembaga Mitra Desa-Pemerintah
                                Desa Girirejo.
                            </p>
                        </div>
                    </div>
                    <div
                        class="h-[581px] w-[369px] rounded-[30px] border-b-[14px] border-r-[14px] border-b-[#0D5568] border-r-[#0D5568] bg-white shadow dark:border-gray-700 dark:bg-gray-800"
                    >
                        <a href="#" class="flex justify-center">
                            <img
                                class="m-3 h-[179px] w-[248px] rounded-xl"
                                src="/images/content.png"
                                alt="berita terkini"
                            />
                        </a>
                        <div class="px-14">
                            <a href="#">
                                <h5
                                    class="mb-2 text-[20px] font-bold uppercase text-gray-900 dark:text-white"
                                >
                                    UKM ISR UPN VETERAN YOGYAKARTA LOLOS
                                    ABDIDAYA 2021
                                </h5>
                            </a>
                            <p
                                class="mb-3 text-[13px] font-normal text-gray-700 dark:text-gray-400"
                            >
                                Unit Kegiatan Mahasiswa Interdisciplinary
                                Scientific Reserch UPN Veteran Yogyakarta yang
                                dibimbing oleh Bapak Oliver Samuel Simanjuntak,
                                S.Kom., M.Eng. lolos menjadi Abdidaya 2021
                                sebagai Nominator Lembaga Mitra Desa-Pemerintah
                                Desa Girirejo.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="hover: mt-3 flex justify-center">
                    <a
                        href="{{ route("berita-terkini") }}"
                        class="rounded-2xl bg-[#0D5568] p-3 text-[15px] text-white transition-transform duration-300 hover:scale-110"
                    >
                        SELENGKAPNYA
                    </a>
                </div>
            </div>
        </section>
        {{-- End Berita Terkini --}}

        {{-- Start Artikel Terkini --}}
        <section class="bg-[#0D5568]">
            <div class="p-8">
                <p
                    class="text-center text-[30px] font-bold"
                    style="color: #f5d05e"
                >
                    ARTIKEL TERKINI
                </p>
                <div class="flex flex-row justify-center gap-6 py-5">
                    <div
                        class="h-[581px] w-[369px] rounded-[30px] border-b-[14px] border-r-[14px] border-b-[#F5D05E] border-r-[#F5D05E] bg-white shadow dark:border-gray-700 dark:bg-gray-800"
                    >
                        <a href="#" class="flex justify-center">
                            <img
                                class="m-3 h-[179px] w-[248px] rounded-xl"
                                src="/images/content.png"
                                alt="berita terkini"
                            />
                        </a>
                        <div class="px-14">
                            <a href="#">
                                <h5
                                    class="mb-2 text-[20px] font-bold uppercase text-gray-900 dark:text-white"
                                >
                                    UKM ISR UPN VETERAN YOGYAKARTA LOLOS
                                    ABDIDAYA 2021
                                </h5>
                            </a>
                            <p
                                class="mb-3 text-[13px] font-normal text-gray-700 dark:text-gray-400"
                            >
                                Unit Kegiatan Mahasiswa Interdisciplinary
                                Scientific Reserch UPN Veteran Yogyakarta yang
                                dibimbing oleh Bapak Oliver Samuel Simanjuntak,
                                S.Kom., M.Eng. lolos menjadi Abdidaya 2021
                                sebagai Nominator Lembaga Mitra Desa-Pemerintah
                                Desa Girirejo.
                            </p>
                        </div>
                    </div>
                    <div
                        class="h-[581px] w-[369px] rounded-[30px] border-b-[14px] border-r-[14px] border-b-[#F5D05E] border-r-[#F5D05E] bg-white shadow dark:border-gray-700 dark:bg-gray-800"
                    >
                        <a href="#" class="flex justify-center">
                            <img
                                class="m-3 h-[179px] w-[248px] rounded-xl"
                                src="/images/content.png"
                                alt="berita terkini"
                            />
                        </a>
                        <div class="px-14">
                            <a href="#">
                                <h5
                                    class="mb-2 text-[20px] font-bold uppercase text-gray-900 dark:text-white"
                                >
                                    UKM ISR UPN VETERAN YOGYAKARTA LOLOS
                                    ABDIDAYA 2021
                                </h5>
                            </a>
                            <p
                                class="mb-3 text-[13px] font-normal text-gray-700 dark:text-gray-400"
                            >
                                Unit Kegiatan Mahasiswa Interdisciplinary
                                Scientific Reserch UPN Veteran Yogyakarta yang
                                dibimbing oleh Bapak Oliver Samuel Simanjuntak,
                                S.Kom., M.Eng. lolos menjadi Abdidaya 2021
                                sebagai Nominator Lembaga Mitra Desa-Pemerintah
                                Desa Girirejo.
                            </p>
                        </div>
                    </div>
                    <div
                        class="h-[581px] w-[369px] rounded-[30px] border-b-[14px] border-r-[14px] border-b-[#F5D05E] border-r-[#F5D05E] bg-white shadow dark:border-gray-700 dark:bg-gray-800"
                    >
                        <a href="#" class="flex justify-center">
                            <img
                                class="m-3 h-[179px] w-[248px] rounded-xl"
                                src="/images/content.png"
                                alt="berita terkini"
                            />
                        </a>
                        <div class="px-14">
                            <a href="#">
                                <h5
                                    class="mb-2 text-[20px] font-bold uppercase text-gray-900 dark:text-white"
                                >
                                    UKM ISR UPN VETERAN YOGYAKARTA LOLOS
                                    ABDIDAYA 2021
                                </h5>
                            </a>
                            <p
                                class="mb-3 text-[13px] font-normal text-gray-700 dark:text-gray-400"
                            >
                                Unit Kegiatan Mahasiswa Interdisciplinary
                                Scientific Reserch UPN Veteran Yogyakarta yang
                                dibimbing oleh Bapak Oliver Samuel Simanjuntak,
                                S.Kom., M.Eng. lolos menjadi Abdidaya 2021
                                sebagai Nominator Lembaga Mitra Desa-Pemerintah
                                Desa Girirejo.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="hover: mt-3 flex justify-center">
                    <a
                        href="{{ route("artikel-terkini") }}"
                        class="rounded-2xl bg-[#F5D05E] p-3 text-[15px] text-white transition-transform duration-300 hover:scale-110"
                    >
                        SELENGKAPNYA
                    </a>
                </div>
            </div>
        </section>
        {{-- End Artikel Terkini --}}

        {{-- Start Mini Blog --}}
        <section class="bg-[#F5D05E]">
            <div class="p-8">
                <p
                    class="text-center text-[30px] font-bold"
                    style="color: #0d5568"
                >
                    MINI BLOG
                </p>
                <div class="flex flex-row justify-center gap-6 py-5">
                    <div
                        class="h-[581px] w-[369px] rounded-[30px] border-b-[14px] border-r-[14px] border-b-[#0D5568] border-r-[#0D5568] bg-white shadow dark:border-gray-700 dark:bg-gray-800"
                    >
                        <a href="#" class="flex justify-center">
                            <img
                                class="m-3 h-[179px] w-[248px] rounded-xl"
                                src="/images/content.png"
                                alt="berita terkini"
                            />
                        </a>
                        <div class="px-14">
                            <a href="#">
                                <h5
                                    class="mb-2 text-[20px] font-bold uppercase text-gray-900 dark:text-white"
                                >
                                    UKM ISR UPN VETERAN YOGYAKARTA LOLOS
                                    ABDIDAYA 2021
                                </h5>
                            </a>
                            <p
                                class="mb-3 text-[13px] font-normal text-gray-700 dark:text-gray-400"
                            >
                                Unit Kegiatan Mahasiswa Interdisciplinary
                                Scientific Reserch UPN Veteran Yogyakarta yang
                                dibimbing oleh Bapak Oliver Samuel Simanjuntak,
                                S.Kom., M.Eng. lolos menjadi Abdidaya 2021
                                sebagai Nominator Lembaga Mitra Desa-Pemerintah
                                Desa Girirejo.
                            </p>
                        </div>
                    </div>
                    <div
                        class="h-[581px] w-[369px] rounded-[30px] border-b-[14px] border-r-[14px] border-b-[#0D5568] border-r-[#0D5568] bg-white shadow dark:border-gray-700 dark:bg-gray-800"
                    >
                        <a href="#" class="flex justify-center">
                            <img
                                class="m-3 h-[179px] w-[248px] rounded-xl"
                                src="/images/content.png"
                                alt="berita terkini"
                            />
                        </a>
                        <div class="px-14">
                            <a href="#">
                                <h5
                                    class="mb-2 text-[20px] font-bold uppercase text-gray-900 dark:text-white"
                                >
                                    UKM ISR UPN VETERAN YOGYAKARTA LOLOS
                                    ABDIDAYA 2021
                                </h5>
                            </a>
                            <p
                                class="mb-3 text-[13px] font-normal text-gray-700 dark:text-gray-400"
                            >
                                Unit Kegiatan Mahasiswa Interdisciplinary
                                Scientific Reserch UPN Veteran Yogyakarta yang
                                dibimbing oleh Bapak Oliver Samuel Simanjuntak,
                                S.Kom., M.Eng. lolos menjadi Abdidaya 2021
                                sebagai Nominator Lembaga Mitra Desa-Pemerintah
                                Desa Girirejo.
                            </p>
                        </div>
                    </div>
                    <div
                        class="h-[581px] w-[369px] rounded-[30px] border-b-[14px] border-r-[14px] border-b-[#0D5568] border-r-[#0D5568] bg-white shadow dark:border-gray-700 dark:bg-gray-800"
                    >
                        <a href="#" class="flex justify-center">
                            <img
                                class="m-3 h-[179px] w-[248px] rounded-xl"
                                src="/images/content.png"
                                alt="berita terkini"
                            />
                        </a>
                        <div class="px-14">
                            <a href="#">
                                <h5
                                    class="mb-2 text-[20px] font-bold uppercase text-gray-900 dark:text-white"
                                >
                                    UKM ISR UPN VETERAN YOGYAKARTA LOLOS
                                    ABDIDAYA 2021
                                </h5>
                            </a>
                            <p
                                class="mb-3 text-[13px] font-normal text-gray-700 dark:text-gray-400"
                            >
                                Unit Kegiatan Mahasiswa Interdisciplinary
                                Scientific Reserch UPN Veteran Yogyakarta yang
                                dibimbing oleh Bapak Oliver Samuel Simanjuntak,
                                S.Kom., M.Eng. lolos menjadi Abdidaya 2021
                                sebagai Nominator Lembaga Mitra Desa-Pemerintah
                                Desa Girirejo.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="hover: mt-3 flex justify-center">
                    <a
                        href="{{ route("mini-blog") }}"
                        class="rounded-2xl bg-[#0D5568] p-3 text-[15px] text-white transition-transform duration-300 hover:scale-110"
                    >
                        SELENGKAPNYA
                    </a>
                </div>
            </div>
        </section>
        {{-- End Mini Blog --}}

        {{-- Start Kegiatan --}}
        <section>
            <div class="mx-auto flex w-full flex-col p-0">
                <div class="flex h-[400px] w-full justify-between">
                    <div class="w-full">
                        <img
                            src="/images/kegiatan.png"
                            alt=""
                            class="h-full object-cover object-center"
                        />
                    </div>
                    <div
                        class="flex w-full items-center justify-center bg-[#0D5568]"
                    >
                        <div class="flex-col">
                            <p
                                class="text-[20px] font-bold"
                                style="color: #f5d05e"
                            >
                                Kegiatan 1
                            </p>
                            <p class="text-[15px]" style="color: #f5d05e">
                                Penjelasan kegiatan beberapa kata sampai satu
                                paragraf
                            </p>
                        </div>
                    </div>
                </div>
                <div class="flex h-[400px] w-full justify-between">
                    <div
                        class="flex w-full items-center justify-center bg-[#F5D05E]"
                    >
                        <div class="flex-col">
                            <p
                                class="text-[20px] font-bold"
                                style="color: #0d5568"
                            >
                                Kegiatan 2
                            </p>
                            <p class="text-[15px]" style="color: #0d5568">
                                Penjelasan kegiatan beberapa kata sampai satu
                                paragraf
                            </p>
                        </div>
                    </div>
                    <div class="w-full">
                        <img
                            src="/images/kegiatan.png"
                            alt=""
                            class="h-full object-cover object-center"
                        />
                    </div>
                </div>
            </div>
        </section>
        {{-- End Kegiatan --}}

        {{-- Start Pengumuman --}}
        <section class="bg-white">
            <div class="relative h-[700px] w-full px-14 pt-12">
                <div class="absolute left-0 top-0">
                    <img src="/images/side-decor-top-left.png" alt="" />
                </div>
                <div class="relative ml-40 mt-24">
                    <h1 class="relative text-2xl font-bold">
                        PENGUMUMAN
                        <span
                            class="ml-5 after:absolute after:bottom-2 after:h-[3px] after:w-[78%] after:bg-[#0D5568]"
                        ></span>
                    </h1>
                </div>
                <div class="ml-40 flex w-5/6 flex-col gap-2">
                    <div
                        class="flex h-[130px] w-full justify-between gap-[100px] pt-3"
                    >
                        <div class="w-full border-b-2 border-[#0D5568] p-1">
                            <div class="relative flex flex-row items-start p-3">
                                <div class="mr-[50px] flex-grow">
                                    <h1
                                        class="text-[16px] font-bold"
                                        style="color: gray"
                                    >
                                        09 / 12 / 2021
                                    </h1>
                                    <p class="mb-0 text-[16px] font-bold">
                                        Rapat Anggota ISR Masa Jabatan 2024/2025
                                        Pada Tanggal 07 Maret 2024
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="w-full border-b-2 border-[#0D5568] p-1">
                            <div class="relative flex flex-row items-start p-3">
                                <div class="mr-[50px] flex-grow">
                                    <h1
                                        class="text-[16px] font-bold"
                                        style="color: gray"
                                    >
                                        09 / 12 / 2021
                                    </h1>
                                    <p class="mb-0 text-[16px] font-bold">
                                        Rapat Anggota ISR Masa Jabatan 2024/2025
                                        Pada Tanggal 07 Maret 2024
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div
                        class="flex h-[130px] w-full justify-between gap-[100px]"
                    >
                        <div class="w-full border-b-2 border-[#0D5568] p-1">
                            <div class="relative flex flex-row items-start p-3">
                                <div class="mr-[50px] flex-grow">
                                    <h1
                                        class="text-[16px] font-bold"
                                        style="color: gray"
                                    >
                                        09 / 12 / 2021
                                    </h1>
                                    <p class="mb-0 text-[16px] font-bold">
                                        Rapat Anggota ISR Masa Jabatan 2024/2025
                                        Pada Tanggal 07 Maret 2024
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="w-full border-b-2 border-[#0D5568] p-1">
                            <div class="relative flex flex-row items-start p-3">
                                <div class="mr-[50px] flex-grow">
                                    <h1
                                        class="text-[16px] font-bold"
                                        style="color: gray"
                                    >
                                        09 / 12 / 2021
                                    </h1>
                                    <p class="mb-0 text-[16px] font-bold">
                                        Rapat Anggota ISR Masa Jabatan 2024/2025
                                        Pada Tanggal 07 Maret 2024
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div
                    class="relative ml-40 mt-16 flex h-[20px] w-[300px] flex-row items-center justify-between border-b-2 border-b-[#0D5568] p-3"
                >
                    <a href="" class="font-bold" style="color: #0d5568">
                        LIHAT PENGUMUMAN LAINNYA
                    </a>
                    <img
                        src="/images/panah.svg"
                        alt="arrow"
                        class="h-[15px] w-[15px]"
                    />
                </div>
                <div class="absolute bottom-0 right-0">
                    <img src="/images/side-decor-bottom-right.png" alt="" />
                </div>
            </div>
        </section>
        {{-- End Pengumuman --}}
    </div>
@endsection
