<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusTugasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $deskripsiStatustugas = ['Sudah Dikerjakan', 'Belum Dikerjakan', 'Batas Waktu Terlewat', 'Sudah Dikerjakan Terlambat'];
        $aliasStatustugas = ['sudah_dikerjakan', 'belum_dikerjakan', 'batas_waktu_terlewat', 'sudah_batas_waktu_terlewat'];
        $colorStatustugas = ['#bbffb3', '#e0e0de', '#ffc4ca', '#ffe79e'];

        for($i = 0; $i < count($deskripsiStatustugas); $i++){
            $id = uniqid('stgs');

            DB::table('statustugas')->insert([
                'id' => $id,
                'deskripsiStatustugas' => $deskripsiStatustugas[$i],
                'aliasStatustugas' => $aliasStatustugas[$i],
                'colorStatustugas' => $colorStatustugas[$i]
            ]);
        }
    }
}
