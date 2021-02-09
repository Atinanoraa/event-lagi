<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDataToTransaksiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('transaksi', function (Blueprint $table) {
            $table->integer('user_id')->length(10)->after('id');
            $table->string('payment_link', 45)->after('user_id');
            $table->string('payment_method', 45)->after('payment_link');
            $table->dateTime('payment_date')->default(now())->after('payment_method');
            $table->dateTime('payment_approve')->default(now())->after('payment_date');
            $table->dateTime('deleted_at')->default(now())->after('updated_at');
            $table->double('harga')->after('deleted_at');
            $table->double('discount')->after('harga');
            $table->double('total')->after('discount');
            $table->string('name')->after('total');
            $table->string('email')->after('name');
            $table->string('no_hp')->after('email');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('transaksi', function (Blueprint $table) {
            $table->dropColumn('user_id');
            $table->dropColumn('payment_link');
            $table->dropColumn('payment_method');
            $table->dropColumn('payment_date');
            $table->dropColumn('payment_approve');
            $table->dropColumn('deleted_at');
            $table->dropColumn('harga');
            $table->dropColumn('discount');
            $table->dropColumn('total');
            $table->dropColumn('name');
            $table->dropColumn('email');
            $table->dropColumn('no_hp');
        });
    }
}
