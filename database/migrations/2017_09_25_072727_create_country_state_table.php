<?php


use Illuminate\Support\Facades\Schema;

use Illuminate\Database\Schema\Blueprint;

use Illuminate\Database\Migrations\Migration;


class CreateCountryStateTable extends Migration

{

    /**

     * Run the migrations.

     *

     * @return void

     */

    public function up()

    {

        Schema::create('countries', function (Blueprint $table) {

            $table->increments('id');

            $table->string('name');

            $table->timestamps();

        });


        Schema::create('states', function (Blueprint $table) {

            $table->increments('id');

            $table->string('name');

            $table->integer('id_country')->unsigned();

            $table->foreign('id_country')->references('id')->on('countries')->onDelete('cascade');

            $table->timestamps();

        });

    }


    /**

     * Reverse the migrations.

     *

     * @return void

     */

    public function down()

    {

        Schema::drop("states");

        Schema::drop("countries");

    }

}