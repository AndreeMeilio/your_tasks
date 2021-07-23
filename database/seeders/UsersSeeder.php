<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');

        for ($index = 1; $index <= 10; $index++){

            DB::table('users')->insert([
                "idUser" => uniqid('user'),
                "namaUser" => $faker->name,
                "emailUser" => $faker->email,
                "passwordUser" => password_hash('123', PASSWORD_DEFAULT),
                "tempatlahirUser" => $faker->city,
                "tanggallahirUser" => $faker->date(),
                "jeniskelaminUser" => $faker->numberBetween(1,2),
                "alamatUser" => $faker->address,

            ]);
        }
    }
}
