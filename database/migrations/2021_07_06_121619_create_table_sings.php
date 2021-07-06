<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableSings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('singer');
            $table->bigInteger('listens')->default(0);
            $table->boolean('active')->default(0);
            $table->string('file_name');
            $table->bigInteger('playlist_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sings', function (Blueprint $table) {
            //
        });
    }
}
