<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDataToEventTiketTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('event_tiket', function (Blueprint $table) {
            $table->dateTime('deleted_at')->default(now())->after('updated_at');
            $table->integer('id_peserta')->after('deleted_at');
            $table->string('nama', 45)->after('id_peserta');
            $table->string('email', 45)->after('nama');
            $table->string('no_telp', 45)->after('email');
            $table->string('alamat')->after('no_telp');
            $table->string('no_ktp')->after('alamat');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('event_tiket', function (Blueprint $table) {
            $table->dropColumn('deleted_at');
            $table->dropColumn('id_peserta');
            $table->dropColumn('nama');
            $table->dropColumn('email');
            $table->dropColumn('no_telp');
            $table->dropColumn('alamat');
            $table->dropColumn('no_ktp');
        });
    }
}
