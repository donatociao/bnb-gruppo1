<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('services', function (Blueprint $table) {
          $table->integer('apartment_id')->unsigned()->after('sea_view')->nullable();
          $table->foreign('apartment_id')->references('id')->on('apartments');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('services', function (Blueprint $table) {
          $table->dropForeign('services_apartment_id_foreign');
          $table->dropColumn('apartment_id');
        });
    }
}
