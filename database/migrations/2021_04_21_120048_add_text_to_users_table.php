<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTextToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            //
            $table->string('introduction', 500)->after('name');
            $table->string('favorite_book', 50);
            $table->string('favorite_book2', 50);
            $table->string('favorite_book3', 50);
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
            //
            $table->dropColumn('introduction');
            $table->dropColumn('favorite_book');
            $table->dropColumn('favorite_book2');
            $table->dropColumn('favorite_book3');
        });
    }
}
