<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('addresses', function (Blueprint $table) {
          $table->integer('geolocal_id')->unsigned()->after('civic_number');
          $table->foreign('geolocal_id')->references('id')->on('geolocals');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('addresses', function (Blueprint $table) {
          $table->dropForeign('addresses_geolocal_id_foreign');
          $table->dropColumn('geolocal_id');

        });
    }
}
