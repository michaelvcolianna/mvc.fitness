<?php

use App\Models\Grouping;
use App\Models\Set;
use App\Models\User;
use App\Models\Workout;
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
        Schema::create('exercises', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Grouping::class)->nullable();
            $table->foreignIdFor(Set::class)->nullable();
            $table->foreignIdFor(User::class)->nullable();
            $table->foreignIdFor(Workout::class)->nullable();
            $table->string('name');
            $table->text('description')->nullable();
            $table->string('machine')->nullable();
            $table->string('video', 2048)->nullable();
            $table->string('reps')->nullable();
            $table->string('weight')->nullable();
            $table->unsignedSmallInteger('rest')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exercises');
    }
};
