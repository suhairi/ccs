<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Bencana;

class BencanaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        Bencana::create(['nama' => 'Rebah']);
        Bencana::create(['nama' => 'Kemarau']);
        Bencana::create(['nama' => 'Banjir']);
        Bencana::create(['nama' => 'Lain']);
    }
}
