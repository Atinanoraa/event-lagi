<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDataToPesertaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('peserta', function (Blueprint $table) {
            $table->string('confirm_notes', 191)->after('no_hp');
            $table->dateTime('confirm_time')->default(now())->after('confirm_notes');
            $table->integer('category_id')->after('confirm_time');
            $table->string('gift_number',191)->after('category_id');
            $table->string('notes', 191)->after('gift_number');
            $table->dateTime('attend_time')->default(now())->after('notes');
            $table->integer('admin_id')->after('attend_time');
            $table->integer('reception_id')->after('admin_id');
            $table->string('qr_code')->after('reception_id');
            $table->integer('status')->after('qr_code');
            $table->timestamp('deleted_at')->default(now())->after('updated_at');
            $table->integer('user_id')->length(10)->after('deleted_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('peserta', function (Blueprint $table) {
            $table->dropColumn('confirm_notes');
            $table->dropColumn('confirm_time');
            $table->dropColumn('category_id');
            $table->dropColumn('gift_number');
            $table->dropColumn('notes');
            $table->dropColumn('attend_time');
            $table->dropColumn('admin_id');
            $table->dropColumn('reception_id');
            $table->dropColumn('qr_code');
            $table->dropColumn('status');
            $table->dropColumn('deleted_at');
            $table->dropColumn('user_id');
        });
    }
}
