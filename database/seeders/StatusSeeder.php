<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');

        DB::table('statustugas')->insert([
            "idStatustugas" => uniqid('stgs'),
            "deskripsiStatustugas" => "Sudah Dikerjakan Tapi Batas Waktu Terlewat",
            "aliasStatustugas" => "sudah_batas_waktu_terlewat",
            "colorStatustugas" => "#ff863b"
        ]);
        
    }
}
