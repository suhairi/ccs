<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Milikan;

class MilikanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Milikan::create(['nama' => 'Milik Sendiri']);
        Milikan::create(['nama' => 'Sewa']);
        Milikan::create(['nama' => 'BSTS']);

    }
}
