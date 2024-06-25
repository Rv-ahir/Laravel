<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('studants', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('age');
            $table->string('gender');
        });

        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->string('email');
            $table->integer('phone');
            $table->string('address');
            $table->string('city');
            $table->foreignId('studant_id')->references('id')->on('studants')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('studants');
    }
};
