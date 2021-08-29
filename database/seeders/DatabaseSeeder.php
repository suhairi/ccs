<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Farmer;
use App\Models\User;
use App\Models\Region;
use Illuminate\Database\Eloquent\Factories\Factory;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        Farmer::factory(15)->create();
        User::create([
            'name'      => 'Suhairi Abdul Hamid',
            'email'     => 'suhairi81@gmail.com',
            'password'  => bcrypt('password123')
        ]);

        for($i=1; $i<=4; $i++)
            Region::create(['nama' => 'Wilayah ' . $i . '']);

    }
}
