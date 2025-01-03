<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_comments', function (Blueprint $table) {
            $table->id('comment_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('curriculum_id');
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->text('commenting');
            $table->timestamps();

            $table->index('user_id');
            $table->index('curriculum_id');
            $table->index('parent_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('curriculum_id')->references('curriculum_id')->on('course_curriculums');
            $table->foreign('comment_id')->references('parent_id')->on('course_comments');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('course_comments', function (Blueprint $table) {
            $table->dropForeign(['course_comments_user_id_foreign', 'course_comments_curriculum_id_foreign', 'course_comments_parent_id_foreign']);
            $table->dropColumn('user_id', 'curriculum_id', 'parent_id');
            $table->dropIndex(['course_comments_user_id_index', 'course_comments_curriculum_id_index', 'course_comments_parent_id_index']);
        });
    }
};
