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
Schema::create('restaurants', function (Blueprint $table) {
    $table->id();

    // --- Названия ---
    $table->string('title_ru');
    $table->string('title_en')->nullable();
    $table->string('title_kk')->nullable();

    // --- Краткое описание (excerpt) ---
    $table->string('excerpt_ru', 500)->nullable();
    $table->string('excerpt_en', 500)->nullable();
    $table->string('excerpt_kk', 500)->nullable();

    // --- Полное описание ---
    $table->text('description_ru')->nullable();
    $table->text('description_en')->nullable();
    $table->text('description_kk')->nullable();

    // --- Адрес на 3 языках ---
    $table->string('address_ru')->nullable();
    $table->string('address_en')->nullable();
    $table->string('address_kk')->nullable();

    // --- Контакты ---
    $table->string('phone')->nullable();
    $table->string('email')->nullable();
    $table->string('website')->nullable();

    // --- Время работы ---
    $table->string('working_hours')->nullable(); // Например: "10:00 — 00:00 (ежедневно)"

    // --- Соцсети ---
    $table->string('instagram')->nullable();
    $table->string('facebook')->nullable();
    $table->string('telegram')->nullable();

    // --- Фото и геолокация ---
    $table->string('image')->nullable();
    $table->decimal('latitude', 10, 7)->nullable();
    $table->decimal('longitude', 10, 7)->nullable();

    // --- Рейтинг ---
    $table->decimal('rating', 3, 2)->default(0);

    // --- SEO-friendly URL ---
    $table->string('slug')->unique();

    $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('restaurants');
    }
};
