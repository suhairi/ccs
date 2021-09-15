<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Education;

class EducationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Education::create([
            'nama'  => 'Tidak Bersekolah'
        ]);

        Education::create([
            'nama'  => 'Sekolah Rendah'
        ]);

        Education::create([
            'nama'  => 'Tamat Tingkatan 3'
        ]);

        Education::create([
            'nama'  => 'Tamat Sekolah Menengah'
        ]);

        Education::create([
            'nama'  => 'Sijil'
        ]);

        Education::create([
            'nama'  => 'Diploma'
        ]);

        Education::create([
            'nama'  => 'Ijazah'
        ]);

        Education::create([
            'nama'  => 'Sarjana'
        ]);

        Education::create([
            'nama'  => 'PHD'
        ]);
   
    }
}
