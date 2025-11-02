<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

public function run()
{
    $categories = [
        'Песчаные дюны',          // например, Бозжыра
        'Скалистые образования',  // Устюрт, мысы
        'Каньоны и ущелья',       // Джангала, Узынкыр
        'Морские побережья',       // Каспийское море, побережье Актау
        'Соленые озера',           // Баскунчак, Арал
        'Пещеры и гроты',          // пещеры Тау-Караган
        'Плато и возвышенности',   // Устюртское плато
        'Острова и косы'           // новые островки Каспия
    ];
    
    foreach ($categories as $name) {
        Category::create(['name' => $name]);
    }
}

}
