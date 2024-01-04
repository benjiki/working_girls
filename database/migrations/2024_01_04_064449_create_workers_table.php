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
        Schema::create('workers', function (Blueprint $table) {
            $table->id();
            $table->string('workername')->nullable();
            $table->string('workerphone')->nullable();
            $table->string('workerphoto')->nullable();
            $table->string('workercolor')->nullable();
            $table->string('workerkg')->nullable();
            $table->string('workerhight')->nullable();
            $table->string('workerage')->nullable();
            $table->string('workerstatus')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('workers');
    }
};
