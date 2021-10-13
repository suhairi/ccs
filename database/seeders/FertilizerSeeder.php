<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Fertilizer;

class FertilizerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Fertilizer::create(['nama' => 'Sebatian']);
        Fertilizer::create(['nama' => 'Urea']);
        Fertilizer::create(['nama' => 'SebatianTambahan']);
        Fertilizer::create(['nama' => 'Lain']);
        
    }
}
