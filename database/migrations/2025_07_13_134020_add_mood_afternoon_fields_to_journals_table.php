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
    Schema::table('journals', function (Blueprint $table) {
        $table->string('mood_afternoon')->nullable()->after('mood_morning');
        $table->string('mood_evening')->nullable()->after('mood_afternoon');
        $table->string('enough')->nullable()->after('activities');
        $table->text('to_do')->nullable()->after('enough');
        $table->text('reflections')->nullable()->after('to_do');
    });
}

public function down(): void
{
    Schema::table('journals', function (Blueprint $table) {
        $table->dropColumn(['mood_afternoon', 'mood_evening', 'enough', 'to_do', 'reflections']);
    });
}

};
