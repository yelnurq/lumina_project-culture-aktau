<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Laravel\Facades\Image;


class RestaurantController extends Controller
{
    /**
     * Отображение списка ресторанов
     */
    public function index()
    {
        $restaurants = Restaurant::orderBy('title_ru')->paginate(9);
        $allRestaurants = Restaurant::select('id', 'title_ru', 'latitude', 'longitude')->get(); // для карты

        return view('restaurants.index', compact('restaurants', 'allRestaurants'));
    }

    /**
     * Просмотр одного ресторана
     */
    public function show(Restaurant $restaurant)
{
    $restaurant->load(['dishes', 'images']); // Подгружаем связи
    return view('restaurants.show', compact('restaurant'));
}


    /**
     * Форма создания ресторана
     */
    public function create()
    {
        return view('restaurants.create');
    }

    /**
     * Сохранение нового ресторана
     */


public function store(Request $request)
{
    $validated = $request->validate([
        // Основные данные
        'title_ru' => 'required|string|max:255',
        'title_en' => 'nullable|string|max:255',
        'title_kk' => 'nullable|string|max:255',

        // Краткое описание
        'excerpt_ru' => 'nullable|string|max:500',
        'excerpt_en' => 'nullable|string|max:500',
        'excerpt_kk' => 'nullable|string|max:500',

        // Подробное описание
        'description_ru' => 'nullable|string',
        'description_en' => 'nullable|string',
        'description_kk' => 'nullable|string',

        // Адреса
        'address_ru' => 'nullable|string|max:255',
        'address_en' => 'nullable|string|max:255',
        'address_kk' => 'nullable|string|max:255',

        // Контакты
        'phone' => 'nullable|string|max:50',
        'email' => 'nullable|email|max:100',
        'website' => 'nullable|string|max:150',

        // Прочее
        'working_hours' => 'nullable|string|max:255',

        // Соцсети
        'instagram' => 'nullable|string|max:150',
        'facebook' => 'nullable|string|max:150',
        'telegram' => 'nullable|string|max:150',

        // Координаты и фото
        'latitude' => 'nullable|numeric',
        'longitude' => 'nullable|numeric',
        'image' => 'nullable|image|max:5120',

        // Галерея и блюда
        'gallery.*' => 'nullable|image|max:5120',
        'dishes' => 'nullable|array',
        'dishes.*.name' => 'nullable|string|max:255',
        'dishes.*.description' => 'nullable|string',
        'dishes.*.image' => 'nullable|image|max:5120',
    ]);

  unset($validated['gallery'], $validated['dishes']);

// === Обработка изображения ===
$imagePath = null;
if ($request->hasFile('image')) {
    $image = $request->file('image');
    $filename = uniqid() . '.webp';
    $pathToSave = storage_path('app/public/restaurants/' . $filename);

    Image::read($image)->save($pathToSave, quality: 70);
    $imagePath = 'restaurants/' . $filename;
}

// === Создание slug ===
$slug = Str::slug($request->title_ru, '-');
$originalSlug = $slug;
$count = 1;
while (Restaurant::where('slug', $slug)->exists()) {
    $slug = $originalSlug . '-' . $count++;
}

// === Создание ресторана ===
$restaurant = Restaurant::create(array_merge($validated, [
    'image' => $imagePath,
    'slug' => $slug,
]));

// === Галерея ===
if ($request->hasFile('gallery')) {
    foreach ($request->file('gallery') as $galleryImage) {
        $filename = uniqid() . '.webp';
        $path = storage_path('app/public/restaurants/gallery/' . $filename);
        Image::read($galleryImage)->save($path, quality: 70);

        $restaurant->images()->create([
            'image' => 'restaurants/gallery/' . $filename,
        ]);
    }
}

// === Блюда ===
if ($request->has('dishes')) {
    foreach ($request->dishes as $dish) {
        $data = [
            'name' => $dish['name'] ?? null,
            'description' => $dish['description'] ?? null,
        ];

        if (isset($dish['image']) && $dish['image'] instanceof \Illuminate\Http\UploadedFile) {
            $filename = uniqid() . '.webp';
            $path = storage_path('app/public/restaurants/dishes/' . $filename);
            Image::read($dish['image'])->save($path, quality: 70);
            $data['image'] = 'restaurants/dishes/' . $filename;
        }

        $restaurant->dishes()->create($data);
    }
}

return redirect()->back()->with('success', 'Ресторан успешно добавлен!');}


    /**
     * Удаление ресторана
     */
    public function destroy(Restaurant $restaurant)
    {
        if ($restaurant->image) {
            Storage::disk('public')->delete($restaurant->image);
        }

        $restaurant->delete();

        return redirect()->route('restaurants.index')->with('success', 'Ресторан удален.');
    }
}
