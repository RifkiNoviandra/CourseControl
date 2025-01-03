<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_curriculums', function (Blueprint $table) {
            $table->id('curriculum_id');
            $table->unsignedBigInteger('curriculum_section_id');
            $table->string('curriculum_name');
            $table->string('curriculum_description');
            $table->string('curriculum_video');
            $table->boolean('curriculum_is_completed')->default(false);
            $table->timestamps();

            $table->index('curriculum_section_id');
            $table->foreign('curriculum_section_id')->references('curriculum_section_id')->on('course_curriculum_sections');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('course_curriculums', function (Blueprint $table) {
            $table->dropForeign('course_curriculums_curriculum_section_id_foreign');
            $table->dropColumn('course_curriculums_section_id');
            $table->dropIndex('course_curriculums_curriculum_section_id_index');
        });
    }
};
