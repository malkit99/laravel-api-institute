<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWebsitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('websites', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('email');
            $table->string('mobile')->nullable();
            $table->string('mobile_2')->nullable();
            $table->integer('status')->default(0);
            $table->text('facebook')->nullable();
            $table->text('insta')->nullable();
            $table->text('twitter')->nullable();
            $table->text('linkedin')->nullable();
            $table->string('address_line_1');
            $table->string('address_line_2')->nullable();
            $table->string('country')->nullable();
            $table->string('state')->nullable();
            $table->string('city')->nullable();
            $table->string('district')->nullable();
            $table->string('pin_code')->nullable();
            $table->string('logo')->nullable();
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
        Schema::dropIfExists('websites');
    }
}
