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
        $table->string('mood')->nullable()->after('day');
    });
}

public function down(): void
{
    Schema::table('journals', function (Blueprint $table) {
        $table->dropColumn('mood');
    });
}
};
