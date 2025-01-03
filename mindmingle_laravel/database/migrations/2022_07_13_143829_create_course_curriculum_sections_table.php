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
        Schema::create('course_curriculum_sections', function (Blueprint $table) {
            $table->id('curriculum_section_id');
            $table->unsignedBigInteger('masterclass_id');
            $table->string('curriculum_section_name');
            $table->boolean('section_is_completed')->default(false);
            $table->timestamps();

            $table->index('masterclass_id');
            $table->foreign('masterclass_id')->references('masterclass_id')->on('course_masterclasses');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('course_curriculum_sections', function (Blueprint $table) {
            $table->dropForeign('masterclass_id_foreign');
            $table->dropColumn('masterclass_id');
            $table->dropIndex('masterclass_id_index');
        });
    }
};
