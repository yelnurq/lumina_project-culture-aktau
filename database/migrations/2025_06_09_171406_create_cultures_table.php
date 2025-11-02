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
    Schema::create('cultures', function (Blueprint $table) {
        $table->id();
        $table->string('title')->index(); 
        $table->text('description')->nullable();
        $table->text('youtube_link')->nullable();
        $table->string('image')->nullable();
        $table->unsignedBigInteger('category_id')->index(); 
        $table->decimal('latitude', 10, 7);
        $table->decimal('longitude', 10, 7);
        $table->timestamps();

        $table->foreign('category_id')
              ->references('id')
              ->on('categories')
              ->onDelete('cascade');
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cultures');
    }
};
