<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateTableMessages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('messages', function (Blueprint $table) {
          $table->integer('apartment_id')->unsigned()->after('email_req')->nullable();
          $table->foreign('apartment_id')->references('id')->on('apartments');

          $table->integer('user_id')->unsigned()->after('email_req')->nullable();
          $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('messages', function (Blueprint $table) {
          $table->dropForeign('requests_apartment_id_foreign');
          $table->dropColumn('apartment_id');

          $table->dropForeign('requests_user_id_foreign');
          $table->dropColumn('user_id');
        });
    }
}
