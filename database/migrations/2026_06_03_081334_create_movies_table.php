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
        Schema::create('movies', function (Blueprint $table) {
            $table->id(); 
        $table->string('title');
        
        
        $table->text('description')->nullable();
        $table->text('synopsis')->nullable();
        
        
        $table->foreignId('author_id')->constrained('author', 'author_id')->onDelete('cascade');
        
      
        $table->string('cover_image')->nullable();

        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movies');
    }
};
