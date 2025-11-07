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
        Schema::create('hotels', function (Blueprint $table) {
            $table->id();

            $table->string('title_ru');
            $table->string('title_en')->nullable();
            $table->string('title_kk')->nullable();

            $table->string('excerpt_ru', 500)->nullable();
            $table->string('excerpt_en', 500)->nullable();
            $table->string('excerpt_kk', 500)->nullable();

            $table->text('description_ru')->nullable();
            $table->text('description_en')->nullable();
            $table->text('description_kk')->nullable();

            $table->string('address_ru')->nullable();
            $table->string('address_en')->nullable();
            $table->string('address_kk')->nullable();

            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('website')->nullable();

            $table->string('working_hours')->nullable(); 

            $table->string('instagram')->nullable();
            $table->string('facebook')->nullable();
            $table->string('telegram')->nullable();

            $table->string('image')->nullable();
            $table->decimal('latitude', 10, 7)->nullable();
            $table->decimal('longitude', 10, 7)->nullable();

            $table->decimal('rating', 3, 2)->default(0);

            $table->string('slug')->unique();

            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hotels');
    }
};
