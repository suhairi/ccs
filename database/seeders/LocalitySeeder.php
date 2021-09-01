<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Locality;

class LocalitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        // Lokaliti - Wilayah1
        Locality::create([
            'code'      => 'A1',
            'nama'      => 'Arau',
            'namapenuh' => 'Harapan Mewah',
            'region_id' => 1
        ]);

        Locality::create([
            'code'      => 'B1',
            'nama'      => 'Kayang',
            'namapenuh' => 'Kampung Tanjung Buluh',
            'region_id' => 1
        ]);

        Locality::create([
            'code'      => 'C1',
            'nama'      => 'Kangar',
            'namapenuh' => 'Bahagia',
            'region_id' => 1
        ]);

        Locality::create([
            'code'      => 'D1',
            'nama'      => 'Tambun Tulang',
            'namapenuh' => 'Setia jaya',
            'region_id' => 1
        ]);

        Locality::create([
            'code'      => 'E1',
            'nama'      => 'Simpang Empat',
            'namapenuh' => 'Jayadiri',
            'region_id' => 1
        ]);


        // ######################
        // Lokaliti - Wilayah 2
        // ######################
        Locality::create([
            'code'      => 'A2',
            'nama'      => 'Kodiang',
            'namapenuh' => '-',
            'region_id' => 2
        ]);

        Locality::create([
            'code'      => 'B2',
            'nama'      => 'Sanglang',
            'namapenuh' => '-',
            'region_id' => 2
        ]);

        Locality::create([
            'code'      => 'C2',
            'nama'      => 'Kerpan',
            'namapenuh' => '-',
            'region_id' => 2
        ]);

        Locality::create([
            'code'      => 'D2',
            'nama'      => 'Tunjang',
            'namapenuh' => '-',
            'region_id' => 2
        ]);

        Locality::create([
            'code'      => 'E2',
            'nama'      => 'Kubang Sepat',
            'namapenuh' => '-',
            'region_id' => 2
        ]);

        Locality::create([
            'code'      => 'F2',
            'nama'      => 'Jerlun',
            'namapenuh' => 'Semangat Baru',
            'region_id' => 2
        ]);

        Locality::create([
            'code'      => 'G2',
            'nama'      => 'Kodiang',
            'namapenuh' => 'Empat Serangkai',
            'region_id' => 2
        ]);

        Locality::create([
            'code'      => 'H2',
            'nama'      => 'Kepala Batas',
            'namapenuh' => 'Telaga Baru',
            'region_id' => 2
        ]);

        Locality::create([
            'code'      => 'I2',
            'nama'      => 'Kuala Sungai',
            'namapenuh' => '-',
            'region_id' => 2
        ]);


        // ######################
        // Lokaliti - Wilayah 3
        // ######################
        Locality::create([
            'code'      => 'A3',
            'nama'      => 'Hutan Kampong',
            'namapenuh' => 'Muda Jaya Kinabalu',
            'region_id' => 3
        ]);

        Locality::create([
            'code'      => 'B3',
            'nama'      => 'Alor Senibong',
            'namapenuh' => 'Gerak Maju',
            'region_id' => 3
        ]);

        Locality::create([
            'code'      => 'C3',
            'nama'      => 'Tajar',
            'namapenuh' => 'Aman',
            'region_id' => 3
        ]);

        Locality::create([
            'code'      => 'D3',
            'nama'      => 'Titi Haji Idris',
            'namapenuh' => 'Silaturrahim',
            'region_id' => 3
        ]);

        Locality::create([
            'code'      => 'E3',
            'nama'      => 'Kobah',
            'namapenuh' => '-',
            'region_id' => 3
        ]);

        Locality::create([
            'code'      => 'F3',
            'nama'      => 'Pendang',
            'namapenuh' => '-',
            'region_id' => 3
        ]);


        // ######################
        // Lokaliti - Wilayah 4
        // ######################
        Locality::create([
            'code'      => 'A4',
            'nama'      => 'Batas Paip',
            'namapenuh' => 'Seri Pantai',
            'region_id' => 4
        ]);

        Locality::create([
            'code'      => 'B4',
            'nama'      => 'Pengkalan Kundur',
            'namapenuh' => 'Adam Malik',
            'region_id' => 4
        ]);

        Locality::create([
            'code'      => 'C4',
            'nama'      => 'Kangkong',
            'namapenuh' => 'Suka Setia',
            'region_id' => 4
        ]);

        Locality::create([
            'code'      => 'D4',
            'nama'      => 'Permatang Buluh',
            'namapenuh' => 'Usaha Padu',
            'region_id' => 4
        ]);

        Locality::create([
            'code'      => 'E4',
            'nama'      => 'Bukit Besar',
            'namapenuh' => '-',
            'region_id' => 4
        ]);

        Locality::create([
            'code'      => 'F4',
            'nama'      => 'Sungai Limau Dalam',
            'namapenuh' => '-',
            'region_id' => 4
        ]);

        Locality::create([
            'code'      => 'G4',
            'nama'      => 'Guar Chempedak',
            'namapenuh' => 'Seri Jerai',
            'region_id' => 4
        ]);

        




        

        


        




    }
}
