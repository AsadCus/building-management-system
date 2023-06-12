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
        Schema::create('login_locations', function (Blueprint $table) {
            $table->id();
            $table->string('location_name');
            $table->string('regional');
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->string('description');
            $table->string('address');
            $table->enum('status',  ['active', 'inactive']);
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
        Schema::dropIfExists('login_locations');
    }
};
