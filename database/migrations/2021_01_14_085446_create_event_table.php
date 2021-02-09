<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event', function (Blueprint $table) {
            $table->id();
            $table->string('id_penyelenggara');
            $table->string('jenis_event', 50);
            $table->string('foto', 50);
            $table->string('nama', 255);
            $table->date('tanggal', 50);
            $table->string('tempat', 100);
            $table->time('waktu_mulai');
            $table->time('waktu_selesai');
            $table->string('deskripsi', 255);
            $table->string('status', 50);
            $table->string('link', 255);
            $table->string('kuota', 50);
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
        Schema::dropIfExists('event');
    }
}
