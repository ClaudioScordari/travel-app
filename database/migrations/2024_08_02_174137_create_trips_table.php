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
        Schema::create('trips', function (Blueprint $table) {
            $table->id();
            $table->string('destination', 64);
            $table->string('img_destination', 255)->nullable();
            $table->date('departure_date')->nullable();
            $table->date('arrival_date')->nullable();
            $table->tinyInteger('num_people')->unsigned()->nullable();
            $table->string('transport', 24)->nullable();
            $table->decimal('price', 6, 2)->unsigned()->nullable();
            $table->boolean('reservation')->nullable();
            $table->text('food')->nullable();
            $table->text('notes')->nullable();
            $table->boolean('travel_completed');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trips');
    }
};
