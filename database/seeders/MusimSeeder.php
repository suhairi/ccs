<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Musim;

class MusimSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Musim::create([
            'musim'         => 1,
            'tahun'         => date("Y"),
            'status'        => 1,
            'created_at'    => now(),
            'updated_at'    => now()
        ]);
    }
}
