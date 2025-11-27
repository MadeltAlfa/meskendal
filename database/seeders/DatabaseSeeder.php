<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $this->call([
            // User Seeder
            UserSeeder::class,

            //  Tentang Kami Seeders
            ProfilLembagaSeeder::class,
            VisiMisiSeeder::class,
            StrukturOrganisasiSeeder::class,
            RoadmapSeeder::class,
            PotensiKerjasamaSeeder::class,

            // Program Kerja Seeder
            ProgramKerjaSeeder::class,

            // Galeri Kegiatan Seeder
            GaleriKegiatanSeeder::class,

            // Publikasi Seeder
            PublikasiSeeder::class,

            // Ekosistem Halal Seeder
            GisPesantrenSeeder::class,
            SertifikasiHalalLinkSeeder::class,
            IndustriKeuanganSyariahSeeder::class,
            KomunitasInvestorHalalSeeder::class,
            KomunitasUmkmHalalSeeder::class,

            // Opini & Berita Seeder
            // OpiniBeritaSeeder::class,

            // Galeri Kegiatan Seeders
            // Old Seeders
            // PostSeeder::class,
            // UlamaSeeder::class,
            // FasilitasSeeder::class,
            // UmkmSeeder::class,
            // CeramahSeeder::class,
            // ZiarahSeeder::class,
            // VideoSeeder::class,
            // PaketWisataSeeder::class,
            // SertifikasiSeeder::class,
            // ManuskripSeeder::class,
            // StakeholderSeeder::class,
        ]);
    }
}
