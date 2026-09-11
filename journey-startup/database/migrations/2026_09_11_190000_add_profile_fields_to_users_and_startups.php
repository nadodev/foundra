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
        Schema::table('users', function (Blueprint $table): void {
            $table->string('job_title', 120)->nullable()->after('email');
        });

        Schema::table('startups', function (Blueprint $table): void {
            $table->string('sector', 120)->nullable()->after('name');
            $table->boolean('is_public')->default(false)->after('solution');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('startups', function (Blueprint $table): void {
            $table->dropColumn(['sector', 'is_public']);
        });

        Schema::table('users', function (Blueprint $table): void {
            $table->dropColumn('job_title');
        });
    }
};
