<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddBookInfoToBookAppsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('book_apps', function (Blueprint $table) {
            $table->string('book_author',50)->nullable();  //カラム追加
            $table->string('book_publishedDate')->nullable();  //カラム追加
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
            $table->dropColumn('book_author');  //カラムの削除
            $table->dropColumn('book_publishedDate');  //カラムの削除
        });
    }
}
