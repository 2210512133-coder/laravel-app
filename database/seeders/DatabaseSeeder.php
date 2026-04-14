<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        // sample criteria (weights in percent)
        \App\Models\Kriteria::insert([
            ['code' => 'C1', 'name' => 'Kecepatan Pengiriman', 'type' => 'benefit', 'description' => 'Kecepatan dalam mengirimkan paket ke tujuan', 'weight' => 25],
            ['code' => 'C2', 'name' => 'Keamanan',              'type' => 'benefit', 'description' => 'Tingkat keamanan paket dari kerusakan dan kehilangan', 'weight' => 20],
            ['code' => 'C3', 'name' => 'Biaya Pengiriman',       'type' => 'cost',    'description' => 'Tarif/harga pengiriman paket', 'weight' => 20],
            ['code' => 'C4', 'name' => 'Jangkauan Area',         'type' => 'benefit', 'description' => 'Cakupan wilayah pengiriman nasional dan regional', 'weight' => 20],
            ['code' => 'C5', 'name' => 'Pelayanan Pelanggan',     'type' => 'benefit', 'description' => 'Kualitas layanan customer service dan track and trace', 'weight' => 15],
        ]);

        // sample alternatives
        \App\Models\Alternatif::insert([
            ['code' => 'A1', 'name' => 'JNE',             'description' => 'Jasa Pengiriman Nasional Terpercaya', 'is_active' => true],
            ['code' => 'A2', 'name' => 'JNT',             'description' => 'Jalur Nugraha Ekakurir', 'is_active' => true],
            ['code' => 'A3', 'name' => 'PAXEL',           'description' => 'Paxel Express Indonesia', 'is_active' => true],
            ['code' => 'A4', 'name' => 'SICEPAT',         'description' => 'Salatiga Cepat Tepat', 'is_active' => true],
            ['code' => 'A5', 'name' => 'ANTERAJA',        'description' => 'PT. Anteraja Indonesia', 'is_active' => true],
            ['code' => 'A6', 'name' => 'TIKI',            'description' => 'Titipan Kilat Indonesia', 'is_active' => true],
            ['code' => 'A7', 'name' => 'POS INDONESIA',   'description' => 'Perusahaan Umum Pos Indonesia', 'is_active' => true],
            ['code' => 'A8', 'name' => 'LION PARCEL',     'description' => 'Lion Parcel Services', 'is_active' => true],
            ['code' => 'A9', 'name' => 'NINJA EXPRES',    'description' => 'Ninja Express Indonesia', 'is_active' => true],
        ]);

        // optionally create some dummy penilaian values (same as in view samples)
        $altIds = \App\Models\Alternatif::pluck('id', 'code');
        $kriIds = \App\Models\Kriteria::pluck('id', 'code');

        $samples = [
            'A1' => [8,8,7,9,8],
            'A2' => [7,7,6,8,7],
            'A3' => [9,8,8,7,8],
            'A4' => [9,7,7,8,7],
            'A5' => [8,7,9,8,7],
            'A6' => [7,8,6,8,8],
            'A7' => [6,7,8,9,6],
            'A8' => [7,7,7,7,7],
            'A9' => [8,8,8,7,8],
        ];

        foreach ($samples as $altCode => $values) {
            foreach ($values as $index => $val) {
                \App\Models\Penilaian::create([
                    'alternatif_id' => $altIds[$altCode],
                    'kriteria_id'   => $kriIds['C'.($index+1)],
                    'value'         => $val,
                ]);
            }
        }
    }
}
