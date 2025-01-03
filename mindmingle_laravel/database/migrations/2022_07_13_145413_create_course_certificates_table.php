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
        Schema::create('course_certificates', function (Blueprint $table) {
            $table->id('certificate_id');
            $table->string('credential_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('masterclass_id');
            $table->unsignedBigInteger('instructor_id');
            $table->boolean('certificate_active');
            $table->string('certificate_validate');
            $table->string('certificate_expired');
            $table->timestamps();

            $table->index('user_id');
            $table->index('masterclass_id');
            $table->index('instructor_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('masterclass_id')->references('masterclass_id')->on('course_masterclasses');
            $table->foreign('instructor_id')->references('instructor_id')->on('course_instructors');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('course_certificates', function (Blueprint $table) {
            $table->dropForeign(['course_certificates_user_id_foreign', 'course_certificates_masterclass_id_foreign', 'course_certificates_instructor_id_foreign']);
            $table->dropColumn('user_id', 'masterclass_id', 'instructor_id');
            $table->dropIndex(['course_certificates_user_id_index', 'course_certificate_masterclass_id_index', 'course_certificates_instructor_id_index']);
        });
    }
};
