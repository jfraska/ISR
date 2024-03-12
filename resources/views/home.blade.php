@extends('layouts.app')

@section('title')
    Home
@endsection

@section('content')
    {{-- Start Hero Page --}}
    <section>
        <video autoplay muted loop class="w-full object-cover">
            <source src="/images/upn-profile.mp4" type="video/mp4">
            Your browser does not support the video tag.
        </video>
    </section>
    {{-- End Hero Page --}}

    {{-- Start Profil ISR --}}
    <section>
        <div class="p-8" style="position: relative; display: flex; align-items: center; flex-direction: row-reverse">
            <img src="/images/upn.png" alt="isr-profile" style="flex-shrink: 0; width: 500px; height: auto;">
            <div class="mr-8" style="width: 500px; height: 200px flex-grow: 1; margin-right: 50px">
                <div class="relative">
                    <h1 style="font-weight: bold; font-size: 30px; position: relative;">Profil ISR
                        <span class="after:absolute ml-5 after:w-2/3 after:h-[3px] after:bg-blue-500 after:bottom-3"></span>
                    </h1>
                </div>
                <p style="margin-top: 10px; font-size: 15px;">Interdisciplinary Scientific Research(ISR) merupakan suatu
                    kelompok
                    studi di bidang penalaran dan penelitian di lingkup kampus Universitas Pembangunan Nasional “
                    Veteran” Yogyakarta. Organisasi ini lahir sebagai wujud kontribusi mahasiswa dalam menjujung tinggi
                    Tri Dharma Perguruan Tinggi yaitu pendidikan dan pengajaran, penelitian, dan pengabdian kepada
                    masyarakat serta mendukung visi dan misi UPN “ Veteran” Yogyakarta dalam menyelenggarakan penelitian
                    dan pengabdian kepada masyarakat.</p>
                <div class="items-center border border-white p-3 mt-7"
                    style="width: 190px; height: 35px; background-color: #028CAA; position: relative; display: flex; align-items: center; justify-content: space-between; flex-direction: row">
                    <a href="" style="color: white">SELENGKAPNYA</a>
                    <img src="/images/arrow.svg" alt="arrow" style="width: 15px; height: 15px;">
                </div>
            </div>
        </div>
    </section>
    {{-- End Profil ISR --}}

    {{-- Start Pendaftaran --}}
    <section>
        <div class="flex flex-col gap-2 py-10 px-20 w-4/5 mx-auto">
            <div class="flex justify-between gap-2 w-full h-[250px]">
                <div class="w-full p-1 border border-blue-600">
                    <div class="p-3"
                        style="position: relative; display: flex; align-items: flex-start; flex-direction: row">
                        <img src="/images/oprec.svg" alt="oprec" class="mr-4" style="width: 35px; height: 35px;">
                        <div class="mr-8" style="flex-grow: 1; margin-right: 50px">
                            <h1 style="font-weight: bold; font-size: 24px; color:#028CAA">Open Recruitmen ISR</h1>
                            <p style="margin-bottom: 0; font-size: 15px;">Buat kalian yang tertarik belajar dan menambah
                                softskill menulis karya ilmiah, penelitian, pengabdian kepada masyarakat, serta
                                berwirausaha, yuk langsung aja gabung menjadi bagian dari UKM Interdisciplinary Scientific
                                Research (ISR)</p>
                            <div class="items-center border border-white p-3 mt-3"
                                style="width: 190px; height: 35px; background-color: #028CAA; position: relative; display: flex; align-items: center; justify-content: space-between; flex-direction: row">
                                <a href="" style="color: white">SELENGKAPNYA</a>
                                <img src="/images/arrow.svg" alt="arrow" style="width: 15px; height: 15px;">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="w-full p-1 border border-blue-600">
                    <div class="p-3"
                        style="position: relative; display: flex; align-items: flex-start; flex-direction: row">
                        <img src="/images/volunteer.svg" alt="oprec" class="mr-4" style="width: 35px; height: 35px;">
                        <div class="mr-8" style="flex-grow: 1; margin-right: 50px">
                            <h1 style="font-weight: bold; font-size: 24px; color:#028CAA">Pendaftaran Volunteer</h1>
                            <p style="margin-bottom: 0; font-size: 15px;">Kalian ingin berkontribusi untuk memajukan bangsa,
                                tapi bingung mulai dari mana? Atau ingin mengisi waktumu dengan hal-hal yang bermanfaat? Yap
                                disini tempatnya!</p>
                            <div class="items-center border border-white p-3 mt-3"
                                style="width: 190px; height: 35px; background-color: #028CAA; position: relative; display: flex; align-items: center; justify-content: space-between; flex-direction: row">
                                <a href="" style="color: white">SELENGKAPNYA</a>
                                <img src="/images/arrow.svg" alt="arrow" style="width: 15px; height: 15px;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex justify-between gap-2 w-full h-[250px]">
                <div class="w-full p-1 border border-blue-600">
                    <div class="p-3"
                        style="position: relative; display: flex; align-items: flex-start; flex-direction: row">
                        <img src="/images/lomba.svg" alt="oprec" class="mr-4" style="width: 35px; height: 35px;">
                        <div class="mr-8" style="flex-grow: 1; margin-right: 50px">
                            <h1 style="font-weight: bold; font-size: 24px; color:#028CAA">Pendaftaran Lomba Umum</h1>
                            <p style="margin-bottom: 0; font-size: 15px;">Kalian ingin berkontribusi untuk memajukan bangsa,
                                tapi bingung mulai dari mana? Atau ingin mengisi waktumu dengan hal-hal yang bermanfaat? Yap
                                disini tempatnya!</p>
                            <div class="items-center border border-white p-3 mt-3"
                                style="width: 190px; height: 35px; background-color: #028CAA; position: relative; display: flex; align-items: center; justify-content: space-between; flex-direction: row">
                                <a href="" style="color: white">SELENGKAPNYA</a>
                                <img src="/images/arrow.svg" alt="arrow" style="width: 15px; height: 15px;">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="w-full p-1 border border-blue-600">
                    <div class="p-3"
                        style="position: relative; display: flex; align-items: flex-start; flex-direction: row">
                        <img src="/images/talenta.svg" alt="oprec" class="mr-4" style="width: 35px; height: 35px;">
                        <div class="mr-8" style="flex-grow: 1; margin-right: 50px">
                            <h1 style="font-weight: bold; font-size: 24px; color:#028CAA">Pendaftaran Ajang Talenta Dikti
                            </h1>
                            <p style="margin-bottom: 0; font-size: 15px;">Kalian ingin berkontribusi untuk memajukan bangsa,
                                tapi bingung mulai dari mana? Atau ingin mengisi waktumu dengan hal-hal yang bermanfaat? Yap
                                disini tempatnya!</p>
                            <div class="items-center border border-white p-3 mt-3"
                                style="width: 190px; height: 35px; background-color: #028CAA; position: relative; display: flex; align-items: center; justify-content: space-between; flex-direction: row">
                                <a href="" style="color: white">SELENGKAPNYA</a>
                                <img src="/images/arrow.svg" alt="arrow" style="width: 15px; height: 15px;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- End Pendaftaran --}}

    {{-- Start Visi ISR --}}
    <section>
        <div class="p-8" style="position: relative; display: flex; align-items: center; flex-direction: row">
            <img src="/images/upn.png" alt="isr-profile" style="flex-shrink: 0; width: 500px; height: auto;">
            <div class="mr-8" style="width: 500px; height: 200px flex-grow: 1; margin-left: 50px">
                <div class="relative">
                    <h1 style="font-weight: bold; font-size: 30px; position: relative;">Visi ISR
                        <span
                            class="after:absolute ml-5 after:w-2/3 after:h-[3px] after:bg-blue-500 after:bottom-3"></span>
                    </h1>
                </div>
                <p style="margin-top: 10px; font-size: 15px;">Menjadi lembaga penalaran dan penelitian interdisipliner
                    yang mampu mewadahi anggota dalam menghasilkan karya karya yang kreatif, inovatif serta dan
                    menumbuhkan integritas dan semangat kecendekiaan dalam pengabdian kepada masyarakat.</p>
                <div class="items-center border border-white p-3 mt-7"
                    style="width: 190px; height: 35px; background-color: #028CAA; position: relative; display: flex; align-items: center; justify-content: space-between; flex-direction: row">
                    <a href="" style="color: white">SELENGKAPNYA</a>
                    <img src="/images/arrow.svg" alt="arrow" style="width: 15px; height: 15px;">
                </div>
            </div>
        </div>
    </section>
    {{-- End Visi ISR --}}

    {{-- Start Misi ISR --}}
    <section>
        <div class="p-8" style="position: relative; display: flex; align-items: center; flex-direction: row-reverse">
            <img src="/images/upn.png" alt="isr-profile" style="flex-shrink: 0; width: 500px; height: auto;">
            <div class="mr-8" style="width: 500px; height: 200px flex-grow: 1; margin-right: 50px">
                <div class="relative">
                    <h1 style="font-weight: bold; font-size: 30px; position: relative;">Misi ISR
                        <span
                            class="after:absolute ml-5 after:w-2/3 after:h-[3px] after:bg-blue-500 after:bottom-3"></span>
                    </h1>
                </div>
                <ol style="margin-top: 10px; font-size: 15px;">
                    <li>
                        1. Melakukan kegiatan pengkajian dan peneletian dengan landasan ilmiah secara interdisipliner.
                    </li>
                    <li>
                        2. Melakukan kegiatan pengabdian kepada masyarakat sesuai dengan kompetensi mahasiswa.</li>
                </ol>
                <div class="items-center border border-white p-3 mt-7"
                    style="width: 190px; height: 35px; background-color: #028CAA; position: relative; display: flex; align-items: center; justify-content: space-between; flex-direction: row">
                    <a href="" style="color: white">SELENGKAPNYA</a>
                    <img src="/images/arrow.svg" alt="arrow" style="width: 15px; height: 15px;">
                </div>
            </div>
        </div>
    </section>
    {{-- End Misi ISR --}}

    {{-- Start Berita Terkini --}}
    <section>
        <div class="p-10">
            <p class="border-b-4 border-b-blue-600" style="font-size: 24px; font-weight: bold">Berita Terkini</p>
            <div class="">
                <div class="flex flex-wrap pt-2">
                    <div class="w-full md:w-1/2 p-1" style="style=width: 550px; height: 200px;">
                        <div class="p-3"
                            style="position: relative; display: flex; align-items: flex-start; flex-direction: row">
                            <img src="/images/content.png" alt="oprec" class="mr-4"
                                style="width: 150px; height: 150px;">
                            <div class="mr-8" style="flex-grow: 1; margin-right: 50px">
                                <h1 style="font-weight: bold; font-size: 16px; color:gray">09 / 12 / 2021</h1>
                                <p style="margin-bottom: 0; font-size: 16px;">Selamat kepada Tim Giriwiradaya <br>
                                    Program
                                    Wira Desa 2021 UKM ISR UPNVY telah berhasil mendapatkan Medali Silver 2nd dalam
                                    "ABDIDAYA 2021".</p>
                            </div>
                        </div>
                    </div>
                    <div class="w-full md:w-1/2 p-1" style="style=width: 550px; height: 200px;">
                        <div class="p-3"
                            style="position: relative; display: flex; align-items: flex-start; flex-direction: row">
                            <img src="/images/content.png" alt="oprec" class="mr-4"
                                style="width: 150px; height: 150px;">
                            <div class="mr-8" style="flex-grow: 1; margin-right: 50px">
                                <h1 style="font-weight: bold; font-size: 16px; color:gray">09 / 12 / 2021</h1>
                                <p style="margin-bottom: 0; font-size: 16px;">Selamat kepada Tim Giriwiradaya <br>
                                    Program
                                    Wira Desa 2021 UKM ISR UPNVY telah berhasil mendapatkan Medali Silver 2nd dalam
                                    "ABDIDAYA 2021".</p>
                            </div>
                        </div>
                    </div>
                    <div class="w-full md:w-1/2 p-1" style="style=width: 550px; height: 200px;">
                        <div class="p-3"
                            style="position: relative; display: flex; align-items: flex-start; flex-direction: row">
                            <img src="/images/content.png" alt="oprec" class="mr-4"
                                style="width: 150px; height: 150px;">
                            <div class="mr-8" style="flex-grow: 1; margin-right: 50px">
                                <h1 style="font-weight: bold; font-size: 16px; color:gray">09 / 12 / 2021</h1>
                                <p style="margin-bottom: 0; font-size: 16px;">Selamat kepada Tim Giriwiradaya <br>
                                    Program
                                    Wira Desa 2021 UKM ISR UPNVY telah berhasil mendapatkan Medali Silver 2nd dalam
                                    "ABDIDAYA 2021".</p>
                            </div>
                        </div>
                    </div>
                    <div class="w-full md:w-1/2 p-1" style="style=width: 550px; height: 200px;">
                        <div class="p-3"
                            style="position: relative; display: flex; align-items: flex-start; flex-direction: row">
                            <img src="/images/content.png" alt="oprec" class="mr-4"
                                style="width: 150px; height: 150px;">
                            <div class="mr-8" style="flex-grow: 1; margin-right: 50px">
                                <h1 style="font-weight: bold; font-size: 16px; color:gray">09 / 12 / 2021</h1>
                                <p style="margin-bottom: 0; font-size: 16px;">Selamat kepada Tim Giriwiradaya <br>
                                    Program
                                    Wira Desa 2021 UKM ISR UPNVY telah berhasil mendapatkan Medali Silver 2nd dalam
                                    "ABDIDAYA 2021".</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="items-center border border-white p-3 mt-7"
                style="width: 190px; height: 35px; background-color: #028CAA; position: relative; display: flex; align-items: center; justify-content: space-between; flex-direction: row">
                <a href="" style="color: white">SELENGKAPNYA</a>
                <img src="/images/arrow.svg" alt="arrow" style="width: 15px; height: 15px;">
            </div>
        </div>
    </section>
    {{-- End Berita Terkini --}}

    {{-- Start Artikel & Mini Blog --}}
    <section>
        <div class="p-10" style="position: relative; display: flex; flex-direction: row">
            {{-- Start Artikel --}}
            <div class="p-2">
                <p class="border-b-4 border-b-blue-600" style="font-size: 24px; font-weight: bold">Artikel</p>
                <div class="">
                    <div class="flex flex-wrap pt-2" style="flex-direction: column">
                        <div class="w-full p-1" style="style=width: 550px; height: 200px;">
                            <div class="p-3"
                                style="position: relative; display: flex; align-items: flex-start; flex-direction: row">
                                <img src="/images/content.png" alt="oprec" class="mr-4"
                                    style="width: 150px; height: 150px;">
                                <div class="mr-8" style="flex-grow: 1; margin-right: 50px">
                                    <h1 style="font-weight: bold; font-size: 16px; color:gray">09 / 12 / 2021</h1>
                                    <p style="margin-bottom: 0; font-size: 16px;">Selamat kepada Tim Giriwiradaya <br>
                                        Program
                                        Wira Desa 2021 UKM ISR UPNVY telah berhasil mendapatkan Medali Silver 2nd dalam
                                        "ABDIDAYA 2021".</p>
                                </div>
                            </div>
                        </div>
                        <div class="w-full p-1" style="style=width: 550px; height: 200px;">
                            <div class="p-3"
                                style="position: relative; display: flex; align-items: flex-start; flex-direction: row">
                                <img src="/images/content.png" alt="oprec" class="mr-4"
                                    style="width: 150px; height: 150px;">
                                <div class="mr-8" style="flex-grow: 1; margin-right: 50px">
                                    <h1 style="font-weight: bold; font-size: 16px; color:gray">09 / 12 / 2021</h1>
                                    <p style="margin-bottom: 0; font-size: 16px;">Selamat kepada Tim Giriwiradaya <br>
                                        Program
                                        Wira Desa 2021 UKM ISR UPNVY telah berhasil mendapatkan Medali Silver 2nd dalam
                                        "ABDIDAYA 2021".</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="items-center border border-white p-3 mt-7"
                    style="width: 190px; height: 35px; background-color: #028CAA; position: relative; display: flex; align-items: center; justify-content: space-between; flex-direction: row">
                    <a href="" style="color: white">SELENGKAPNYA</a>
                    <img src="/images/arrow.svg" alt="arrow" style="width: 15px; height: 15px;">
                </div>
            </div>
            {{-- Start Artikel --}}

            {{-- Start Mini Blog --}}
            <div class="p-2">
                <p class="border-b-4 border-b-blue-600" style="font-size: 24px; font-weight: bold">Mini Blog</p>
                <div class="">
                    <div class="flex flex-wrap pt-2" style="flex-direction: column">
                        <div class="w-full p-1" style="style=width: 550px; height: 200px;">
                            <div class="p-3"
                                style="position: relative; display: flex; align-items: flex-start; flex-direction: row">
                                <img src="/images/content.png" alt="oprec" class="mr-4"
                                    style="width: 150px; height: 150px;">
                                <div class="mr-8" style="flex-grow: 1; margin-right: 50px">
                                    <h1 style="font-weight: bold; font-size: 16px; color:gray">09 / 12 / 2021</h1>
                                    <p style="margin-bottom: 0; font-size: 16px;">Selamat kepada Tim Giriwiradaya <br>
                                        Program
                                        Wira Desa 2021 UKM ISR UPNVY telah berhasil mendapatkan Medali Silver 2nd dalam
                                        "ABDIDAYA 2021".</p>
                                </div>
                            </div>
                        </div>
                        <div class="w-full p-1" style="style=width: 550px; height: 200px;">
                            <div class="p-3"
                                style="position: relative; display: flex; align-items: flex-start; flex-direction: row">
                                <img src="/images/content.png" alt="oprec" class="mr-4"
                                    style="width: 150px; height: 150px;">
                                <div class="mr-8" style="flex-grow: 1; margin-right: 50px">
                                    <h1 style="font-weight: bold; font-size: 16px; color:gray">09 / 12 / 2021</h1>
                                    <p style="margin-bottom: 0; font-size: 16px;">Selamat kepada Tim Giriwiradaya <br>
                                        Program
                                        Wira Desa 2021 UKM ISR UPNVY telah berhasil mendapatkan Medali Silver 2nd dalam
                                        "ABDIDAYA 2021".</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="items-center border border-white p-3 mt-7"
                    style="width: 190px; height: 35px; background-color: #028CAA; position: relative; display: flex; align-items: center; justify-content: space-between; flex-direction: row">
                    <a href="" style="color: white">SELENGKAPNYA</a>
                    <img src="/images/arrow.svg" alt="arrow" style="width: 15px; height: 15px;">
                </div>
            </div>
            {{-- End Mini Blog --}}
        </div>
    </section>
    {{-- End Artikel & Mini Blog --}}

    {{-- Start Kegiatan --}}
    <section>
        <div class="p-10">
            <img src="/images/kegiatan.png" alt="">
        </div>
    </section>
    {{-- End Kegiatan --}}

    {{-- Start Pengumuman --}}
    <section>
        <div class="p-10 ml-40">
            <p class="border-b-4 border-b-blue-600" style="font-size: 24px; font-weight: bold">PENGUMUMAN</p>
            <div class="">
                <div class="flex flex-wrap pt-2">
                    <div class="w-full md:w-1/2 p-1 border-b-2 border-gray-700"
                        style="style=width: 550px; height: 120px;">
                        <div class="p-3"
                            style="position: relative; display: flex; align-items: flex-start; flex-direction: row">
                            <div class="mr-8" style="flex-grow: 1; margin-right: 50px">
                                <h1 style="font-weight: bold; font-size: 16px; color:gray">09 / 12 / 2021</h1>
                                <p style="margin-bottom: 0; font-size: 16px;">Rapat Anggota ISR Masa Jabatan 2024/2025
                                    Pada Tanggal 07 Maret 2024</p>
                            </div>
                        </div>
                    </div>
                    <div class="w-full md:w-1/2 p-1 border-b-2 border-gray-700"
                        style="style=width: 550px; height: 120px;">
                        <div class="p-3"
                            style="position: relative; display: flex; align-items: flex-start; flex-direction: row">
                            <div class="mr-8" style="flex-grow: 1; margin-right: 50px">
                                <h1 style="font-weight: bold; font-size: 16px; color:gray">09 / 12 / 2021</h1>
                                <p style="margin-bottom: 0; font-size: 16px;">Rapat Anggota ISR Masa Jabatan 2024/2025
                                    Pada Tanggal 07 Maret 2024</p>
                            </div>
                        </div>
                    </div>
                    <div class="w-full md:w-1/2 p-1 border-b-2 border-gray-700"
                        style="style=width: 550px; height: 120px;">
                        <div class="p-3"
                            style="position: relative; display: flex; align-items: flex-start; flex-direction: row">
                            <div class="mr-8" style="flex-grow: 1; margin-right: 50px">
                                <h1 style="font-weight: bold; font-size: 16px; color:gray">09 / 12 / 2021</h1>
                                <p style="margin-bottom: 0; font-size: 16px;">Rapat Anggota ISR Masa Jabatan 2024/2025
                                    Pada Tanggal 07 Maret 2024</p>
                            </div>
                        </div>
                    </div>
                    <div class="w-full md:w-1/2 p-1 border-b-2 border-gray-700"
                        style="style=width: 550px; height: 120px;">
                        <div class="p-3"
                            style="position: relative; display: flex; align-items: flex-start; flex-direction: row">
                            <div class="mr-8" style="flex-grow: 1; margin-right: 50px">
                                <h1 style="font-weight: bold; font-size: 16px; color:gray">09 / 12 / 2021</h1>
                                <p style="margin-bottom: 0; font-size: 16px;">Rapat Anggota ISR Masa Jabatan 2024/2025
                                    Pada Tanggal 07 Maret 2024</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="items-center border border-white p-3 mt-7"
                style="width: 300px; height: 20px; position: relative; display: flex; justify-content: space-between; flex-direction: row">
                <a href="" style="color: #028CAA; font-weight: bold">LIHAT PENGUMUMAN LAINNYA</a>
                <img src="/images/panah.svg" alt="arrow" style="width: 15px; height: 15px;">
            </div>
        </div>
    </section>
    {{-- End Pengumuman --}}
@endsection
