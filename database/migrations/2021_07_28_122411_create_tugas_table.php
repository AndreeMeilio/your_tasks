<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTugasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tugas', function (Blueprint $table) {
            $table->string('id', 255)->primaryKey();
            $table->string('users_id', 255);
            $table->string('matapelajaran_id', 255);
            $table->string('namaTugas', 255);
            $table->text('deskripsiTugas')->nullAble();
            $table->string('guruBersangkutan', 255)->nullAble();
            $table->date('tanggaldiberiTugas');
            $table->date('tanggaldeadlineTugas');
            $table->string('tempatpengumpulanTugas', 255)->nullAble();
            $table->string('statustugas_id', 255);
            $table->integer('tugas_berbintang', 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tugas');
    }
}
