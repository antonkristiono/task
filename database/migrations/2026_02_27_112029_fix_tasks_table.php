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
        if (Schema::hasTable('task_tabel')) {
            Schema::rename('task_tabel', 'tasks');
            Schema::table('tasks', function (Blueprint $table) {
                $table->text('description')->nullable()->after('title');
                $table->string('status')->default('pending')->change();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasTable('tasks')) {
            Schema::table('tasks', function (Blueprint $table) {
                // Changing back status type might fail on sqlite, but we can drop description
                $table->dropColumn('description');
            });
            Schema::rename('tasks', 'task_tabel');
        }
    }
};
