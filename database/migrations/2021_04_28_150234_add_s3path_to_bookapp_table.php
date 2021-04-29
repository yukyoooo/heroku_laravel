<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddS3pathToBookappTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('book_apps', function (Blueprint $table) {
            $table->string('image_path')->nullable();
            $table->string('book_detail', 500)->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('book_apps', function (Blueprint $table) {
            $table->string('book_detail', 500)->nullable(false)->change();
            $table->dropColumn('image_path');
        });
    }
}
