<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Penyakit;

class PenyakitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Penyakit::create(['nama' => 'Karah']);
        Penyakit::create(['nama' => 'Hawar Daun Bakteria (BLB)']);
        Penyakit::create(['nama' => 'Hawar Seludang']);
        Penyakit::create(['nama' => 'Bintik Perang']);

    }
}
