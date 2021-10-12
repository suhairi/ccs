<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Perosak;

class PerosakSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Perosak::create(['nama' => 'Tikus']);
        Perosak::create(['nama' => 'Siput Gondang']);
        Perosak::create(['nama' => 'Kutu Thrip']);
        Perosak::create(['nama' => 'Ulat Pengorek Batang']);
        Perosak::create(['nama' => 'Ulat Gulung Daun']);
        Perosak::create(['nama' => 'Ulat Layar']);
        Perosak::create(['nama' => 'Bena Perang']);
        Perosak::create(['nama' => 'Kesing']);
        
    }
}
