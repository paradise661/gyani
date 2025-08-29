<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePackageVisaTable extends Migration
{
    public function up()
    {
        Schema::create('package_visa', function (Blueprint $table) {
            $table->id(); // auto-increment primary key
            $table->string('question')->nullable();
            $table->longText('answer')->nullable();
            $table->string('order')->nullable();
            $table->unsignedBigInteger('package_id')->nullable(); // link to packages table if needed
            $table->timestamps();

            // Optional: foreign key
            // $table->foreign('package_id')->references('id')->on('packages')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('package_visa');
    }
}
