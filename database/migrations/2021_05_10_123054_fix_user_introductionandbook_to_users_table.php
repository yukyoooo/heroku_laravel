<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class FixUserIntroductionandbookToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('introduction', 500)->nullable()->change();
            $table->string('favorite_book', 50)->nullable()->change();
            $table->string('favorite_book2', 50)->nullable()->change();
            $table->string('favorite_book3', 50)->nullable()->change();
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
            $table->string('introduction', 500)->change();
            $table->string('favorite_book', 50)->change();
            $table->string('favorite_book2', 50)->change();
            $table->string('favorite_book3', 50)->change();
        });
    }
}
