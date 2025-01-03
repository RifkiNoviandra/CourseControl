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
        Schema::create('users', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('role_id')->default(2);
            $table->string('full_name');
            $table->string('email')->unique();
            $table->string('username')->unique();
            $table->string('password');
            $table->enum('status', ['active', 'inactive', 'deactivated'])->default('inactive');
            $table->timestamp('email_verified_at')->nullable();
            $table->boolean('is_email_verified')->default(false);
            $table->string('profile_picture');
            $table->string('phone_number')->nullable();
            $table->text('about')->nullable();
            $table->string('job_title')->nullable();
            $table->string('social_twitter')->nullable();
            $table->string('social_instagram')->nullable();
            $table->string('social_facebook')->nullable();
            $table->string('social_linkedin')->nullable();
            $table->string('social_youtube')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->string('provider_id')->nullable();

            $table->index('role_id');
            $table->foreign('role_id')->references('role_id')->on('roles');
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
            $table->dropForeign('users_role_id_foreign');
            $table->dropColumn('role_id');
            $table->dropIndex('users_role_id_index');
        });

    }
};
