<?php

namespace App\Http\Controllers;

use App\Models\HomeSetting;
use App\Models\ProfilLembaga;
use App\Models\VisiMisi;
use App\Models\StrukturOrganisasi;
use App\Models\Roadmap;
use App\Models\PotensiKerjasama;
use App\Models\Publikasi;
use App\Models\Ulama;
use App\Models\Fasilitas;
use App\Models\Umkm;
use App\Models\KawasanWisataHalal;
use App\Models\SertifikasiHalalLink;
use App\Models\Galeri;
use App\Models\GisPesantren;
use App\Models\IndustriKeuanganSyariah;
use App\Models\KomunitasInvestorHalal;
use App\Models\KomunitasUmkmHalal;
use Illuminate\Http\Request;

class WisataController extends Controller
{

    private const PAGINATION_COUNT = 9;

    // =================== POST  ===================
    public function homeIndex()
    {

        // Kode di bawah ini tidak akan dieksekusi untuk sementara
        $homeSetting = HomeSetting::firstOrNew();
        $profil = ProfilLembaga::firstOrNew(); // Tetap menggunakan ProfilLembaga model
        $visiMisi = VisiMisi::firstOrNew();
        $struktur = StrukturOrganisasi::firstOrNew();
        $roadmap = Roadmap::firstOrNew();

        return view('home', compact(
            'homeSetting',
            'profil', // Tapi kirim sebagai 'profil'
            'visiMisi',
            'struktur',
            'roadmap'
        ));
    }


    public function beritaIndex()
    {
        // $featuredPost = \App\Models\Post::where('kategori', 'Berita')->latest()->first();

        // $posts = \App\Models\Post::where('kategori', 'Berita')
        //     ->when($featuredPost, function ($query) use ($featuredPost) {
        //         return $query->where('id', '!=', $featuredPost->id);
        //     })
        //     ->latest()
        //     ->take(5)
        //     ->get();

        // return view('posts.berita', compact('featuredPost', 'posts'));
        $posts = \App\Models\Post::where('kategori', 'Berita')->latest()->paginate(5);
        return view('posts.berita', compact('posts'));
    }
    public function loadMoreBerita(Request $request)
    {
        $posts = \App\Models\Post::where('kategori', 'Berita')
                ->latest()
                ->paginate(5, ['*'], 'page', $request->query('page'));

        return response()->json($posts);
    }

    public function pengumumanIndex()
    {
        $posts = \App\Models\Post::where('kategori', 'Pengumuman')->latest()->paginate(5);
        return view('posts.pengumuman', compact('posts'));
    }

    public function loadMorePengumuman(Request $request)
    {
        $posts = \App\Models\Post::where('kategori', 'Pengumuman')
                ->latest()
                ->paginate(5, ['*'], 'page', $request->query('page'));

        return response()->json($posts);
    }


    // =================== ULAMA ===================
    public function ulamaIndex()
    {
        // $ulamas = Ulama::latest()->paginate(self::PAGINATION_COUNT);
        // return view('ulama.index', compact('ulamas'));

        // $ulamas = \App\Models\Ulama::latest()->paginate(10);
        // return view('ulama.index', compact('ulamas'));

        // Perbaikan: Ambil data ulama unggulan
        // Buat tampilan interaktif mas hehe
        $featuredUlama = \App\Models\Ulama::latest()->first();

        $ulamas = \App\Models\Ulama::query()
            ->when($featuredUlama, function ($query) use ($featuredUlama) {
                // Pastikan data unggulan tidak muncul lagi di daftar bawah
                return $query->where('id', '!=', $featuredUlama->id);
            })
            ->latest()
            ->paginate(10);

        return view('ulama.index', compact('featuredUlama', 'ulamas'));
    }

    public function ulamaShow(Ulama $ulama)
    {
        return view('ulama.show', compact('ulama'));
    }

    // =================== FASILITAS ===================
    public function fasilitasIndex()
    {
        // Perbaikan: $fasilitas -> $fasilitass
        // $fasilitass = Fasilitas::latest()->paginate(self::PAGINATION_COUNT);
        // return view('fasilitas.index', compact('fasilitass'));

        $featuredFasilitas = \App\Models\Fasilitas::latest()->first();

        // Buat tampilan interaktif mas hehe
        $fasilitass = \App\Models\Fasilitas::query()
            ->when($featuredFasilitas, function ($query) use ($featuredFasilitas) {
                return $query->where('id', '!=', $featuredFasilitas->id);
            })
            ->latest()
            ->paginate(8);

        return view('fasilitas.index', compact('featuredFasilitas', 'fasilitass'));
    }

    public function fasilitasShow(Fasilitas $fasilitas)
    {
        return view('fasilitas.show', compact('fasilitas'));
    }

    // =================== UMKM ===================
    public function umkmIndex()
    {
        // $umkms = Umkm::latest()->paginate(self::PAGINATION_COUNT);
        // return view('umkm.index', compact('umkms'));

        $umkms = \App\Models\Umkm::latest()->paginate(9);

        return view('umkm.index', compact('umkms'));
    }

    public function umkmShow(Umkm $umkm)
    {
        return view('umkm.show', compact('umkm'));
    }

    // =================== VIDEO ===================
    // Methods removed as part of cleanup

    public function programIndex()
    {
        return view('program.index');
    }

    public function kawasanIndex()
    {
        $featuredKawasan = KawasanWisataHalal::with('dokumentasi')->latest()->first();

        $kawasans = KawasanWisataHalal::with('dokumentasi')
            ->latest()
            ->paginate(8);

        return view('ekosistemhalal.kawasanwisata.index', compact('featuredKawasan', 'kawasans'));
    }

    public function sertifikasiHalalIndex()
    {
        // Ambil satu-satunya baris data link dari database
        $links = SertifikasiHalalLink::first();

        // Kirim data ke view 'sertifikasi-halal.index'
        return view('ekosistemhalal.sertifikasiproduk.index', compact('links'));
    }

    public function galeriInvestasiIndex()
    {
        // Ambil data foto dari model GisPesantren, urutkan dari yang terbaru
        $fotos = GisPesantren::latest()->paginate(12); // Mengambil 12 foto per halaman

        // Kirim data ke view dengan path yang benar
        return view('ekosistemhalal.galeryinvestasi.index', compact('fotos'));
    }

    public function industriKeuanganSyariahIndex()
    {
        // Ambil data dari database, urutkan dari yang terbaru
        $items = IndustriKeuanganSyariah::latest()->paginate(12); // Mengambil 12 item per halaman

        // Kirim data ke view dengan path yang benar
        return view('ekosistemhalal.industrikeuangan.index', compact('items'));
    }

    public function komunitasInvestorIndex()
    {
        // Ambil satu-satunya baris data link dari database
        $link = KomunitasInvestorHalal::first();

        // PERUBAHAN DI SINI: Mengarah ke folder 'ekosistemhalal.komunitasinvestor'
        return view('ekosistemhalal.komunitasinvestor.index', compact('link'));
    }

    public function komunitasUmkmIndex()
    {
        // Ambil satu-satunya baris data link dari database
        $link = KomunitasUmkmHalal::first();

        // PERUBAHAN DI SINI: Mengarah ke folder 'ekosistemhalal.komunitasumkm'
        return view('ekosistemhalal.komunitasumkm.index', compact('link'));
    }


}

