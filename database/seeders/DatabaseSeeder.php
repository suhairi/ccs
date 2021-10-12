<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\Farmer;
use App\Models\User;
use App\Models\Region;
use App\Models\Education;

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

        //Region - Wilayah
        for($i=1; $i<=4; $i++)
            Region::create(['nama' => 'Wilayah ' . $i . '']);

        // Localities - lokaliti
        $this->call([LocalitySeeder::class]);

        // Education
        $this->call([EducationSeeder::class]);

        // Variety
        $this->call([VarietySeeder::class]);

        // Method
        $this->call([MethodSeeder::class]);

        // Fertilizer
        $this->call([FertilizerSeeder::class]);

        // Perosak
        $this->call([PerosakSeeder::class]);

        // Penyakit
        $this->call([PenyakitSeeder::class]);

        // Bencana
        $this->call([BencanaSeeder::class]);

        


    }
}
