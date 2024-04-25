<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * This method adds a new 'author_name' column to the 'posts' table.
     */
    public function up(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            // Add the 'author_name' column after the 'author' column (optional)
            // $table->string('author_name')->after('author');  // Uncomment for specific placement

            $table->string('author_name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * This method removes the 'author_name' column from the 'posts' table.
     * (It's typically left empty unless you need to rollback the migration)
     */
    public function down(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->dropColumn('author_name');
        });
    }
};

