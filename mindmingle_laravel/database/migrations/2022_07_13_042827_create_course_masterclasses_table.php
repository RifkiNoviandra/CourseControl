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
        Schema::create('course_masterclasses', function (Blueprint $table) {
            $table->id('masterclass_id');
            $table->unsignedBigInteger('category_id');
            $table->string('masterclass_name')->unique();
            $table->string('masterclass_short_desc');
            $table->unsignedBigInteger('masterclass_level_id');
            $table->unsignedBigInteger('class_type_id');
            $table->unsignedBigInteger('price_type_id');
            $table->string('masterclass_thumbnail');
            $table->string('masterclass_video_preview');
            $table->string('masterclass_slug')->unique();
            $table->string('masterclass_price')->nullable();
            $table->string('masterclass_discount')->nullable();
            $table->string('masterclass_total_duration')->nullable();
            $table->string('masterclass_total_curriculum')->nullable();
            $table->text('masterclass_description')->nullable();
            $table->timestamps();

            $table->index('category_id');
            $table->index('masterclass_level_id');
            $table->index('class_type_id');
            $table->index('price_type_id');
            $table->foreign('category_id')->references('category_id')->on('course_categories');
            $table->foreign('masterclass_level_id')->references('masterclass_level_id')->on('course_masterclass_levels');
            $table->foreign('class_type_id')->references('class_type_id')->on('course_class_types');
            $table->foreign('price_type_id')->references('price_type_id')->on('course_price_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('course_masterclasses', function (Blueprint $table) {
            $table->dropForeign(['masterclass_level_id_foreign', 'category_id_foreign', 'class_type_id_foreign', 'price_type_id_foreign']);
            $table->dropColumn('masterclass_level_id', 'category_id', 'class_type_id', 'price_type_id');
            $table->dropIndex(['masterclass_level_id_index', 'category_id_index', 'class_type_id_index', 'price_type_id_index']);
        });
    }
};
