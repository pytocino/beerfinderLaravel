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
        Schema::create('locals', function (Blueprint $table) {
            $table->id();
            $table->string('user_id')->constrained('users', 'id');
            $table->string('name')->unique();
            $table->string('type')->nullable();
            $table->string('description')->nullable();
            $table->string('email')->unique();
            $table->string('phone')->nullable();
            $table->string('image')->nullable();
            $table->string('address')->unique()->nullable();
            $table->string('latitude')->unique()->nullable();
            $table->string('longitude')->unique()->nullable();
            $table->string('city')->nullable();
            $table->string('region')->nullable();
            $table->string('website')->nullable();
            $table->boolean('verified')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('locals');
    }
};
