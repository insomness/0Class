<?php

use App\Rekening;
use App\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Rekening::create([
            'nomor_rekening' => 1234567890,
            'atas_nama' => 'lorem'
        ]);

        Setting::create([
            'about' => '<h4>Tidak ada deskripsi about us</h4>',
            'harga' => 150000,
            'rekening_id' => 1
        ]);

    }
}
