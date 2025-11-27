<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'MES Kendal')</title>
    <link rel="icon" type="image/svg+xml" href="{{ asset('images/image2vector.svg') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        html {
            scroll-behavior: smooth;
        }

        .custom-shadow {
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.07);
        }

        .custom-shadow-hover:hover {
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<body class="bg-slate-50">

    <div class="relative min-h-screen md:flex">

        <aside id="sidebar"
            class="fixed top-0 left-0 z-50 w-64 h-screen bg-white border-r p-6 transform -translate-x-full transition-transform duration-300 ease-in-out flex flex-col">
            <a href="{{ route('home') }}">
                        <img src="{{ asset('images/logomess.png') }}" alt="Logo MES Kendal" class="h-10 w-auto">
            </a>
            <nav class="mt-8 flex-grow overflow-y-auto">
                <ul class="space-y-2">

                    <li x-data="{ open: false }">
                        <button @click="open = !open"
                            class="flex items-center justify-between w-full p-2 text-base font-normal text-gray-900 rounded-lg hover:bg-gray-100">
                            {{-- PERUBAHAN DI SINI --}}
                            <span class="ml-3 flex-grow text-left">Tentang Kami</span>
                            <svg class="w-4 h-4 transition-transform duration-200" :class="{ 'rotate-180': open }"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        <ul x-show="open" x-transition class="pl-8 mt-2 space-y-2">
                            <li><a href="{{ route('tentang.profil') }}"
                                    class="block p-2 text-sm rounded-lg hover:bg-gray-50">Profil MES Kendal</a></li>
                            <li><a href="{{ route('tentang.visimisi') }}"
                                    class="block p-2 text-sm rounded-lg hover:bg-gray-50">Visi Misi</a></li>
                            <li><a href="{{ route('tentang.struktur') }}"
                                    class="block p-2 text-sm rounded-lg hover:bg-gray-50">Struktur Organisasi</a></li>
                            <li><a href="{{ route('tentang.roadmap') }}"
                                    class="block p-2 text-sm rounded-lg hover:bg-gray-50">Roadmap Organisasi</a></li>
                            <li><a href="{{ route('tentang.potensi') }}"
                                    class="block p-2 text-sm rounded-lg hover:bg-gray-50">Sebaran Potensi Kerjasama</a>
                            </li>
                            <li><a href="{{ route('login') }}"
                                    class="block p-2 text-sm rounded-lg hover:bg-gray-50">Login Admin</a>
                            </li>
                        </ul>
                    </li>

                    <li x-data="{ open: false }">
                        <button @click="open = !open"
                            class="flex items-center justify-between w-full p-2 text-base font-normal text-gray-900 rounded-lg hover:bg-gray-100">
                            {{-- PERUBAHAN DI SINI --}}
                            <span class="ml-3 flex-grow text-left">Program Kerja</span>
                            <svg class="w-4 h-4 transition-transform duration-200" :class="{ 'rotate-180': open }"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        <ul x-show="open" x-transition class="pl-8 mt-2 space-y-2">
                            <li><a href="{{ route('program-kerja.show', 'pengurus-harian') }}"
                                    class="block p-2 text-sm rounded-lg hover:bg-gray-50">Pengurus Harian</a></li>
                            <li><a href="{{ route('program-kerja.show', 'ziswaf-dan-csr') }}"
                                    class="block p-2 text-sm rounded-lg hover:bg-gray-50">Bidang Ziswaf dan CSR</a></li>
                            <li><a href="{{ route('program-kerja.show', 'penelitian') }}"
                                    class="block p-2 text-sm rounded-lg hover:bg-gray-50">Bidang Penelitian dan
                                    Pengembangan Ekonomi Syariah</a></li>
                            <li><a href="{{ route('program-kerja.show', 'bisnis-pariwisata') }}"
                                    class="block p-2 text-sm rounded-lg hover:bg-gray-50">Bidang Bisnis, Pariwisata, dan
                                    Ekonomi Kreatif</a></li>
                            <li><a href="{{ route('program-kerja.show', 'multimedia') }}"
                                    class="block p-2 text-sm rounded-lg hover:bg-gray-50">Bidang Multimedia dan
                                    Kominfo</a></li>
                            <li><a href="{{ route('program-kerja.show', 'sinergi') }}"
                                    class="block p-2 text-sm rounded-lg hover:bg-gray-50">Bidang Sinergi Antar Lembaga
                                    Dan Komunitas</a></li>
                            <li><a href="{{ route('program-kerja.show', 'kaderisasi') }}"
                                    class="block p-2 text-sm rounded-lg hover:bg-gray-50">Bidang Kaderisasi</a></li>
                            <li><a href="{{ route('program-kerja.show', 'pendidikan') }}"
                                    class="block p-2 text-sm rounded-lg hover:bg-gray-50">Bidang Pendidikan dan
                                    Pelatihan</a></li>
                        </ul>
                    </li>

                    <li x-data="{ open: false }">
                        <button @click="open = !open"
                            class="flex items-center justify-between w-full p-2 text-base font-normal text-gray-900 rounded-lg hover:bg-gray-100">
                            {{-- PERUBAHAN DI SINI --}}
                            <span class="ml-3 flex-grow text-left"><a
                                    href="{{ route('publikasi.index') }}">Publikasi</a></span>
                        </button>
                    </li>

                    <li x-data="{ open: false }">
                        <button @click="open = !open"
                            class="flex items-center justify-between w-full p-2 text-base font-normal text-gray-900 rounded-lg hover:bg-gray-100">
                            {{-- PERUBAHAN DI SINI --}}
                            <span class="ml-3 flex-grow text-left"><a href="{{ route('galeri.index') }}">Galeri
                                    Kegiatan</a></span>
                        </button>
                    </li>


                    <li x-data="{ open: false }">
                        <button @click="open = !open"
                            class="flex items-center justify-between w-full p-2 text-base font-normal text-gray-900 rounded-lg hover:bg-gray-100">
                            {{-- PERUBAHAN DI SINI --}}
                            <span class="ml-3 flex-grow text-left">Ekosistem Halal</span>
                            <svg class="w-4 h-4 transition-transform duration-200" :class="{ 'rotate-180': open }"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        <ul x-show="open" x-transition class="pl-8 mt-2 space-y-2">
                            <li><a href="{{ route('galeri-investasi.index') }}"
                                    class="block p-2 text-sm rounded-lg hover:bg-gray-50">Galery
                                    Investasi Syariah Pesantren</a></li>
                            <li><a href="{{ route('kawasan.index') }}"
                                    class="block p-2 text-sm rounded-lg hover:bg-gray-50">Kawasan Wisata
                                    Halal</a></li>
                            <li><a href="{{ route('sertifikasi-halal.index') }}"
                                    class="block p-2 text-sm rounded-lg hover:bg-gray-50">Sertifikasi
                                    Produk Halal</a></li>
                            <li><a href="{{ route('industri-keuangan-syariah.index') }}"
                                    class="block p-2 text-sm rounded-lg hover:bg-gray-50">Industri
                                    Keuangan Syariah</a></li>
                            <li><a href="{{ route('komunitas-investor.index') }}"
                                    class="block p-2 text-sm rounded-lg hover:bg-gray-50">Komunitas
                                    Investor Halal Kendal</a></li>
                            <li><a href="{{ route('komunitas-umkm.index') }}"
                                    class="block p-2 text-sm rounded-lg hover:bg-gray-50">Komunitas UMKM
                                    Halal Kendal</a></li>
                        </ul>
                    </li>


                    <li x-data="{ open: false }">
                        <button @click="open = !open"
                            class="flex items-center justify-between w-full p-2 text-base font-normal text-gray-900 rounded-lg hover:bg-gray-100">
                            {{-- PERUBAHAN DI SINI --}}
                            <span class="ml-3 flex-grow text-left"><a href="{{ route('opini.index') }}">Opini &
                                    Berita</a></span>
                        </button>
                    </li>


            </nav>
        </aside>

        <div id="sidebar-overlay" class="fixed inset-0 bg-black bg-opacity-50 z-40 hidden"></div>

        <div id="main-content" class="flex-1 flex flex-col transition-all duration-300 ease-in-out">
            <header class="bg-white p-4 border-b flex items-center justify-between sticky top-0 z-30">
                <div class="flex items-center gap-4">
                    <button id="sidebar-toggle-btn">
                        <svg id="icon-open" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16m-7 6h7" />
                        </svg>
                        <svg id="icon-close" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 hidden"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                    <a href="{{ route('home') }}">
                                <img src="{{ asset('images/logomess.png') }}" alt="Logo MES Kendal" class="h-10 w-auto">
                    </a>
                </div>
            </header>

            <main class="flex-grow">
                @yield('content')
            </main>

            <footer class="py-12 bg-white border-t">
                <div class="container mx-auto px-6 text-center">

                    <h2 class="text-2xl font-bold text-jabal-green mb-2">Hubungi Kami</h2>
                    <p class="text-gray-500 mb-8 max-w-xl mx-auto">Untuk informasi lebih lanjut mengenai program dan
                        potensi kerjasama dengan Pengurus Daerah Masyarakat Ekonomi Syariah (MES) Kendal.</p>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 text-left">

                        <div class="bg-slate-50 p-6 rounded-lg border">
                            <p class="font-bold text-gray-800">Ketua Umum</p>
                            <p class="text-gray-600 text-sm">M. Irkham Fukhuludin, SEI. CWC.</p>
                            <a href="https://wa.me/6281901570870" target="_blank"
                                class="inline-flex items-center gap-2 mt-2 text-jabal-light hover:underline text-sm font-semibold">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24 ">
                                    <path
                                        d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.487 5.235 3.487 8.413 0 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.447-4.435-9.884-9.888-9.884-5.448 0-9.886 4.434-9.889 9.885.002 2.024.603 3.992 1.742 5.688l.263.393-1.019 3.75z" />
                                </svg>
                                <span>+62 819-0157-0870</span>
                            </a>
                        </div>

                        <div class="bg-slate-50 p-6 rounded-lg border">
                            <p class="font-bold text-gray-800">Sekretaris Umum</p>
                            <p class="text-gray-600 text-sm">M. Fatchurrohman, SHI, ME.</p>
                            <a href="https://wa.me/6287730046561" target="_blank"
                                class="inline-flex items-center gap-2 mt-2 text-jabal-light hover:underline text-sm font-semibold">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.487 5.235 3.487 8.413 0 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.447-4.435-9.884-9.888-9.884-5.448 0-9.886 4.434-9.889 9.885.002 2.024.603 3.992 1.742 5.688l.263.393-1.019 3.75z" />
                                </svg>
                                <span>+62 877-3004-6561</span>
                            </a>
                        </div>

                        <div class="bg-slate-50 p-6 rounded-lg border">
                            <p class="font-bold text-gray-800">Bendahara Umum</p>
                            <p class="text-gray-600 text-sm">Iqbal Sarayulus Nuh, SM</p>
                            <a href="https://wa.me/6285640952149" target="_blank"
                                class="inline-flex items-center gap-2 mt-2 text-jabal-light hover:underline text-sm font-semibold">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.487 5.235 3.487 8.413 0 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.447-4.435-9.884-9.888-9.884-5.448 0-9.886 4.434-9.889 9.885.002 2.024.603 3.992 1.742 5.688l.263.393-1.019 3.75z" />
                                </svg>
                                <span>+62 856-4095-2149</span>
                            </a>
                        </div>
                    </div>

                    <div class="mt-12 pt-8 border-t border-slate-200">
                        <p class="text-gray-500 text-sm">&copy; {{ date('Y') }} Wisata Halal Jabal Nur.
                            Dikembangkan oleh PD MES Kendal.</p>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('sidebar-overlay');
            const toggleBtn = document.getElementById('sidebar-toggle-btn');
            const iconOpen = document.getElementById('icon-open');
            const iconClose = document.getElementById('icon-close');
            const mainContent = document.getElementById('main-content');

            function toggleSidebar() {
                const isSidebarOpen = !sidebar.classList.contains('-translate-x-full');
                sidebar.classList.toggle('-translate-x-full');
                iconOpen.classList.toggle('hidden');
                iconClose.classList.toggle('hidden');
                if (window.innerWidth < 768) {
                    overlay.classList.toggle('hidden');
                } else {
                    mainContent.classList.toggle('ml-64', !isSidebarOpen);
                }
            }
            if (window.innerWidth >= 768) {
                sidebar.classList.add('-translate-x-full');
                mainContent.classList.remove('ml-64');
                iconOpen.classList.remove('hidden');
                iconClose.classList.add('hidden');
            }
            toggleBtn.addEventListener('click', (e) => {
                e.stopPropagation();
                toggleSidebar();
            });
            overlay.addEventListener('click', toggleSidebar);
        });
    </script>
</body>

</html>
