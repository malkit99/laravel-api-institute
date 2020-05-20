<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('course_name');
            $table->integer('course_code_id')->nullable();
            $table->string('title');
            $table->string('slug');
            $table->integer('course_category_id');
            $table->integer('batch_id')->nullable();
            $table->string('skill_level')->nullable();
            $table->integer('duration_id')->nullable();
            $table->integer('course_fee_id')->nullable();
            $table->text('course_image')->nullable();
            $table->integer('status')->default(1);
            $table->integer('popular_course')->default(0);
            $table->integer('discount_status')->default(0);
            $table->integer('certificate')->default(1);
            $table->integer('pratical_training')->default(1);
            $table->integer('certified_instructor')->default(1);
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
        Schema::dropIfExists('courses');
    }
}
