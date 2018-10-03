<?php

use App\Course;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->unsignedInteger('teacher_id');
            $table->foreign('teacher_id')->references('id')->on('teachers');
            $table->unsignedInteger('category_id');
            $table->foreign('category_id')->references('id')->on('categories');
            $table->unsignedInteger('level_id');
            $table->foreign('level_id')->references('id')->on('levels');
            $table->string('name');
            $table->text('description');
            $table->text('slug')->comment('url amigable');
            $table->string('picture')->nullable();
            $table->enum('status',[
                Course::PUBLISHED,
                COURSE::PENDING,
                COURSE::REJECTED
                ])->default(COURSE::PENDING);
            $table->boolean('previous_approved')->default(false);
            $table->boolean('previous_rejected')->default(false);
            $table->timestamps();
            $table->softDeletes()->comment('eliminacion de forma logica');
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
