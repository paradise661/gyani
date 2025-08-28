<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('packages', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('image')->nullable();
            $table->string('banner_image')->nullable();
            $table->longText('description')->nullable();
            $table->longText('short_description')->nullable();
            $table->string('slug')->nullable();
            $table->string('order')->nullable();
            $table->string('destination')->nullable();
            $table->boolean('status')->default(0);
            $table->double('price')->nullable();
            $table->longText('inclusion')->nullable();
            $table->longText('exclusion')->nullable();

            $table->string('seo_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->text('meta_keywords')->nullable();
            $table->longText('seo_schema')->nullable();
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
        Schema::dropIfExists('packages');
    }
}
