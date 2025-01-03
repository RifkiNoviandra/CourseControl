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
        Schema::create('course_classes', function (Blueprint $table) {
            $table->id('class_id');
            $table->unsignedBigInteger('masterclass_id');
            $table->unsignedBigInteger('user_id');
            $table->date('class_date');
            $table->enum('class_status', ['active', 'inactive']);
            $table->timestamps();

            $table->index('masterclass_id');
            $table->index('user_id');
            $table->foreign('masterclass_id')->references('masterclass_id')->on('course_masterclasses');
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
        Schema::table('course_classes', function (Blueprint $table) {
            $table->dropForeign(['course_classes_masterclass_id_foreign', 'course_classes_masterclass_user_id_foreign']);
            $table->dropColumn('masterclass_id', 'user_id');
            $table->dropIndex(['course_classes_masterclass_id_index', 'course_classes_user_id_index']);
        });
    }
};
