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
        Schema::create('category', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug'); // Note: I removed ->unique() here, see below
            $table->text('description')->nullable();
            $table->string('image')->nullable();
            $table->string('color')->default('#4f46e5');

            // Ownership: Crucial for a multi-user Todo List
            $table->foreignId('user_id')->constrained()->onDelete('cascade');

            // Nested Categories
            $table->foreignId('parent_id')->nullable()->constrained('category')->onDelete('cascade');

            $table->timestamps();

            // Pro-tip: Make the combination of slug and user_id unique
            $table->unique(['slug', 'user_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('category');
    }
};
