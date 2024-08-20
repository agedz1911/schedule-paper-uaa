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
        Schema::table('schedule_papers', function (Blueprint $table) {
            $table->string('room')->nullable()->after('time_presenter');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('schedule_papers', function (Blueprint $table) {
            $table->dropColumn('room');
        });
    }
};
