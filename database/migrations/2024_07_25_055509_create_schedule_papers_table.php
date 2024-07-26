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
        Schema::create('schedule_papers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained('category_papers')->cascadeOnDelete();
            $table->string('code_abstract')->nullable();
            $table->string('name_participant');
            $table->text('title');
            $table->date('date_presenter');
            $table->string('time_presenter');
            $table->boolean('is_active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('schedule_papers');
    }
};
