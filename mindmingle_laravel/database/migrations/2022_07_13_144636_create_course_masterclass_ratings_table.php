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
        Schema::create('course_masterclass_ratings', function (Blueprint $table) {
            $table->id('rating_id');
            $table->unsignedBigInteger('masterclass_id');
            $table->unsignedBigInteger('user_id');
            $table->integer('rating_count');
            $table->text('rating_comment');
            $table->integer('rating_status');
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
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['course_masterclass_ratings_masterclass_id_foreign', 'course_masterclass_ratings_user_id_index']);
            $table->dropColumn('masterclass_id', 'user_id');
            $table->dropIndex(['course_masterclass_ratings_masterclass_id_index', 'course_masterclass_ratings_user_id_index']);
        });
    }
};
