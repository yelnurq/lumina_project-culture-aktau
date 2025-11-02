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
        Schema::create('culture_images', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('culture_id')->index();
            $table->string('image_path'); 
            $table->timestamps();

            $table->foreign('culture_id')
                ->references('id')
                ->on('cultures')
                ->onDelete('cascade');
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('culture_images');
    }
};
