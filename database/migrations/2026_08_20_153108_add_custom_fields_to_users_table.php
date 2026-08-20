<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('role')->default('turista')->after('password');
            $table->string('phone', 20)->nullable()->after('role');
            $table->string('identification', 30)->nullable()->after('phone');
            $table->string('country', 100)->nullable()->after('identification');
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['role', 'phone', 'identification', 'country']);
        });
    }
};