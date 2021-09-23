<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Method;

class MethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Method::create([
            'nama'  => 'Tabur Terus Basah'
        ]);

        Method::create([
            'nama'  => 'Tabur Dalam Air'
        ]);

        Method::create([
            'nama'  => 'Tabur Terus Kering'
        ]);

        Method::create([
            'nama'  => 'Mencedung'
        ]);

        Method::create([
            'nama'  => 'Jentanam'
        ]);
        
    }
}
