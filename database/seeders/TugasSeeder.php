<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class TugasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');

        for ($index = 1; $index <= 20; $index++){

            DB::table('tugas')->insert([
                "idTugas" => uniqid('tgs'),
                "idMatapelajaran" => 'mp60f9019f87e63',
                "namaTugas" => $faker->word,
                "deskripsiTugas" => $faker->text,
                "guruBersangkutan" => $faker->name,
                "tanggaldiberiTugas" => $faker->date(),
                "tanggaldeadlineTugas" => $faker->date(),
                "tempatpengumpulanTugas" => $faker->city,
                "idStatustugas" => $faker->numberBetween(1,4)
            ]);
        }
    }
}
