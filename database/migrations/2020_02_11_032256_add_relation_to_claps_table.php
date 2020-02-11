<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationToClapsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('claps', function (Blueprint $table) {
            $table->unsignedBigInteger('brewery_id');
            $table->foreign('brewery_id')->references('id')->on('breweries');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('claps', function (Blueprint $table) {
            $table->dropColumn('brewery_id');
        });
    }
}
