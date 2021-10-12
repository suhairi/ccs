<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Variety;

class VarietySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        Variety::create(['nama'  => 'MR 219']);
        Variety::create(['nama'  => 'MR 220 CL2']);
        Variety::create(['nama'  => 'MR 269']);
        Variety::create(['nama'  => 'UKMRC2']);
        Variety::create(['nama'  => 'MR SIRAJ 297']);
        Variety::create(['nama'  => 'MR 307']);
        Variety::create(['nama'  => 'LAIN']);
       
    }
}
