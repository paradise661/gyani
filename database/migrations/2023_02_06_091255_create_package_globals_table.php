<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePackageGlobalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('package_globals', function (Blueprint $table) {
            $table->id();
            $table->string('priceprefix')->nullable();
            $table->string('priceper')->nullable();
            $table->string('discount')->nullable();
            $table->string('duration')->nullable();
            $table->string('type')->nullable();
            $table->string('size')->nullable();
            $table->string('transportation')->nullable();
            $table->string('activity')->nullable();
            $table->string('season')->nullable();
            $table->string('accomod')->nullable();
            $table->string('meal')->nullable();
            $table->string('package_id')->nullable();
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
        Schema::dropIfExists('package_globals');
    }
}
