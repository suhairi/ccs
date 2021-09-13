<?php

namespace Database\Factories;

use App\Models\Farmer;
use Illuminate\Database\Eloquent\Factories\Factory;

class FarmerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Farmer::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $nama = [
                    'Ahmad izham bin ahmad rizal', 
                    'mohamad faqif hasyraf bin mohd ariffin',
                    'mohamad faris haziq bin mohd qoudryshah',
                    'mohammad airiel bin abdullah',
                    'muhammad al fateh affan bin zaharmi',
                    'muhammad ammar bin mohd faizal',
                    'mohammad arief shukur bin rosli',
                    'nik muhammad afiq bin nik mohd azmin',
                    'dhiya qrisya rania binti mohd sarhan',
                    'irdina amni binti abdul zuki',
                    'kaseh izzara sofea binti azuan',
                    'nur afreen amanda binti mhd rawi',
                    'tuah muhammad muizz asyraf bin mohd roznan',
                    'qurbatul ain binti mhd alwi',
                    'cheah siew pei',
                    'choo hui zhen',
                    'yeoh may wei',
                    'chuah pei lim',
                    'ong chun wei'
                ];
        $alamat = [
                    'No. 17 Bandar Darulaman Jaya, 06000 Jitra, Kedah Darul Aman',
                    'Lot. 4, Jalan Delima 1, Taman Delima, 08800 Guar Chempedak, Kedah Darul Aman',
                    'No. 1, Jalan Syariah, 34950 Bandar Baharu, Kedah Darul Aman',
                    'No. 232, Jalan Kota Kenari, 09000 Kulim, Kedah Darul Aman',
                    'No. 77, Lengkok Cempaka 1, Pusat Bandar Amanjaya, 08000 Sungai Petani, Kedah Darul Aman',
                    'Lot 1529, Jalan Kuala Nerang, Taman Belimbing Indah, 06300 Kuala Nerang, Kedah Darul Aman',
                    'No. 28-A, Pusat Perniagaan Alamanda, 08200 Sik, Kedah Darul Aman',
                    'No 9 & 10,Pusat Perniagaan Shahab Utama, Jalan Senangin 1,Lebuhraya Sultanah Bahiyah, Alor Setar Kedah 05150',
                    'Aras 8, Bangunan Sultan Abdul Halim, Jalan Sultan Badlishah, 05000 Alor Star, Kedah Darul Aman',
                    'NO.100, GROUND FLOOR, SEBERANG JALAN PUTRA, 05150 ALOR SETAR, KEDAH',
                    'NO.7, KOMPLEKS PERNIAGAAN JELATEK, 05460 JALAN LANGGAR, ALOR SETAR, KEDAH.',
                    'NO. 275, JALAN BSG 10, BANDAR STARGATE, 05400 ALOR SETAR, KEDAH.',
                    'KM 12.5, KAMPUNG ALOR BINJAL, JALAN DATOK KUMBAR MUKIM TAJAR, 06500 ALOR SETAR, KEDAH.',
                    '184 GF, JALAN SHAHAB 5, SHAHAB PERDANA, 05150 ALOR SETAR, KEDAH.',
                    'NO.233, MEDAN PUTRA, JALAN PUTRA, MEDAN PUTRA, 05150 ALOR SETAR, KEDAH.',
                    'NO.7, KOMPLEKS PERNIAGAAN JELATEK, 05460 JALAN LANGGAR, ALOR SETAR, KEDAH.',
                    'NO.60, GROUND FLOOR, SRI TANDOP, JALAN LENCONG BARAT, 05400 ALOR SETAR, KEDAH.',
                    'NO.100, GROUND FLOOR, SEBERANG JALAN PUTRA, 05150 ALOR SETAR, KEDAH.',
                    'NO.7, KOMPLEKS PERNIAGAAN JELATEK, 05460 JALAN LANGGAR, ALOR SETAR, KEDAH.'
                ];
        $phone = [
                    '04-4429286',
                    '013-5950014',
                    '011-62518542',
                    '012-3365252',
                    '012-9985462',
                    '016-8565125',
                    '04-7718255',
                    '04-6589874',
                    '017-7718569',
                    '016-5069012',
                    '014-4338116',
                    '019-9205377',
                    '011-11501151',
                    '018-5643212',
                    '015-5556521'
                ];

        return [
            'nama'      => $this->faker->randomElement($nama),
            'nokp'      => $this->faker->numerify('############'),
            'jantina'   => $this->faker->randomElement(['LELAKI', 'PEREMPUAN']),
            'umur'      => $this->faker->numberBetween(25,70),
            'pendidikan'=> $this->faker->randomElement(['PMR', 'SPM', 'IJAZAH', 'DIPLOMA', 'SARJANA', 'PHD', 'LAIN-LAIN']),
            'milikan'   => $this->faker->randomElement(['SENDIRI', 'SEWA']),
            'notel'     => $this->faker->randomElement($phone),
            'alamat'    => $this->faker->randomElement($alamat),
        ];
    }
}
