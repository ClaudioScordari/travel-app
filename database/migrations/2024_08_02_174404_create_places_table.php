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
        Schema::create('places', function (Blueprint $table) {
            $table->id();
            $table->foreignId('trip_id')->constrained('trips')->onDelete('cascade');
            $table->string('name', 64);
            $table->string('img_place', 255)->nullable();
            $table->text('description')->nullable();
            $table->time('hour')->nullable();
            $table->tinyInteger('cost')->unsigned()->nullable();
            $table->enum('priority', ['bassa', 'media', 'alta'])->nullable();
            $table->tinyInteger('review')->unsigned()->nullable();
            $table->boolean('visited');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('places');
    }
};
