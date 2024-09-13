<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id(); // Creates an auto-incrementing integer column named 'id'
            $table->text('title'); // Creates a 'title' column of type TEXT
            $table->text('author'); // Creates an 'author' column of type TEXT
            $table->text('genre'); // Creates a 'genre' column of type TEXT
            $table->integer('vote_count'); // Creates an 'vote_count' column of type INTEGER
            $table->timestamps(); // Adds created_at and updated_at columns
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
