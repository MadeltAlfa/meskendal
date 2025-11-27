<?php
namespace Database\Seeders;
use App\Models\Roadmap;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage; // Added for Storage facade

class RoadmapSeeder extends Seeder
{
    public function run(): void
    {
        Roadmap::query()->delete();

        // Pastikan folder tujuan ada
        if (!Storage::disk('public')->exists('roadmap')) {
            Storage::disk('public')->makeDirectory('roadmap');
        }

        $sourcePath = public_path('images/roadmap.jpg');
        $destinationPath = 'roadmap/roadmap.jpg';
        $gambarRoadmap = null; // Initialize to null

        // Copy image if it exists
        if (file_exists($sourcePath)) {
            Storage::disk('public')->put($destinationPath, file_get_contents($sourcePath));
            $gambarRoadmap = $destinationPath;
        } else {
            $this->command->warn('File public/images/roadmap.jpg tidak ditemukan. Field gambar_roadmap akan diisi null.');
        }

        Roadmap::create([
            'gambar_roadmap' => $gambarRoadmap,
            'tahap1_tahun' => '2021 - 2023',
            'tahap1_deskripsi' => 'Mendukung Indonesia menjadi pusat ekonomi dan keuangan syariah dunia.',
            'tahap2_tahun' => '2024 - 2027',
            'tahap2_deskripsi' => 'Memperkuat kontribusi ekonomi dan keuangan syariah dalam perekonomian nasional.',
            'tahap3_tahun' => '2028 - 2030',
            'tahap3_deskripsi' => 'Mendorong implementasi sistem ekonomi dan keuangan syariah yang menyeluruh.',
        ]);
    }
}
