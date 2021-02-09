<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDataToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('pin', 191)->after('password')->nullable();
            $table->string('phone', 191)->after('pin')->nullable();
            $table->dateTime('phone_verified_at')->default(now())->after('phone');
            $table->integer('account_type')->after('phone_verified_at')->nullable();
            $table->string('account_role', 191)->after('account_type')->nullable();
            $table->string('photo', 191)->after('account_role')->nullable();
            $table->dateTime('last_login')->default(now())->after('photo');
            $table->longText('fcm_token')->after('account_status');
            $table->timestamp('deleted_at')->nullable()->after('updated_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('pin');
            $table->dropColumn('phone');
            $table->dropColumn('phone_verified_at');
            $table->dropColumn('account_type');
            $table->dropColumn('account_role');
            $table->dropColumn('photo');
            $table->dropColumn('last_login');
            $table->dropColumn('fcm_token');
            $table->dropColumn('deleted_at');
        });
    }
}
