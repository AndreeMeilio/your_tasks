<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStatustugasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('statustugas', function (Blueprint $table) {
            $table->string('id', 255)->primaryKey();
            $table->text('deskripsiStatustugas');
            $table->string('aliasStatustugas', 255);
            $table->string('colorStatustugas', 255);
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
        Schema::dropIfExists('statustugas');
    }
}
