<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropTableSings5 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('playlists', function (Blueprint $table) {
            //
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('playlists', function (Blueprint $table) {
            $table->dropForeign('sings_playlist_id_foreign');
            $table->dropColumn('playlist_id');
            $table->dropIfExists('playlists');
        });
    }
}
