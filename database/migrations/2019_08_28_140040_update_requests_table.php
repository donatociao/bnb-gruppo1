<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('requests', function (Blueprint $table) {
          $table->integer('apartment_id')->unsigned()->after('email_req')->nullable();
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
        Schema::table('requests', function (Blueprint $table) {
          $table->dropForeign('requests_apartment_id_foreign');
          $table->dropColumn('apartment_id');
        });
    }
}
