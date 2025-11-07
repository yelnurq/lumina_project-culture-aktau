<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Laravel\Facades\Image;


class HotelController extends Controller
{
   
    public function index()
    {
        $hotels = Hotel::orderBy('title_ru')->paginate(9);
        $allHotels = Hotel::select('id', 'title_ru', 'latitude', 'longitude')->get();
        $restaurants = Restaurant::all()->take(3);

        return view('hotels.index', compact('hotels', 'allHotels', 'restaurants'));
    }

    public function show(Request $request, $id)
    {
        $hotel = Hotel::with('images', 'rooms')->findOrFail($id);

        $similarHotels = Hotel::where('id', '!=', $hotel->id)
            ->orderBy('title_ru')
            ->take(3)
            ->get();

        if ($request->ajax()) {
            $lang = $request->get('lang', 'ru');

            $data = [
                'title' => $hotel->{'title_' . $lang},
                'description' => $hotel->{'description_' . $lang},
                'address' => $hotel->{'address_' . $lang},
                'excerpt' => $hotel->{'excerpt_' . $lang},
                'latitude' => $hotel->latitude,
                'longitude' => $hotel->longitude,
            ];

            return response()->json($data);
        }

        return view('hotels.show', compact('hotel', 'similarHotels'));
    }


    public function create()
    {
        return view('hotels.create');
    }




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
            'rooms' => 'nullable|array',
            'rooms.*.name' => 'nullable|string|max:255',
            'rooms.*.description' => 'nullable|string',
            'rooms.*.image' => 'nullable|image|max:5120',
        ]);

    unset($validated['gallery'], $validated['rooms']);

    $imagePath = null;
    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $filename = uniqid() . '.webp';
        $pathToSave = storage_path('app/public/hotels/' . $filename);

        Image::read($image)->save($pathToSave, quality: 70);
        $imagePath = 'hotels/' . $filename;
    }

    $slug = Str::slug($request->title_ru, '-');
    $originalSlug = $slug;
    $count = 1;
    while (Hotel::where('slug', $slug)->exists()) {
        $slug = $originalSlug . '-' . $count++;
    }

    $hotel = Hotel::create(array_merge($validated, [
        'image' => $imagePath,
        'slug' => $slug,
    ]));

    if ($request->hasFile('gallery')) {
        foreach ($request->file('gallery') as $galleryImage) {
            $filename = uniqid() . '.webp';
            $path = storage_path('app/public/hotels/gallery/' . $filename);
            Image::read($galleryImage)->save($path, quality: 70);

            $hotel->images()->create([
                'image' => 'hotels/gallery/' . $filename,
            ]);
        }
    }

    if ($request->has('rooms')) {
        foreach ($request->rooms as $dish) {
            $data = [
                'name' => $dish['name'] ?? null,
                'description' => $dish['description'] ?? null,
            ];

            if (isset($dish['image']) && $dish['image'] instanceof \Illuminate\Http\UploadedFile) {
                $filename = uniqid() . '.webp';
                $path = storage_path('app/public/hotels/rooms/' . $filename);
                Image::read($dish['image'])->save($path, quality: 70);
                $data['image'] = 'hotels/rooms/' . $filename;
            }

            $hotel->rooms()->create($data);
        }
    }

    return redirect()->back()->with('success', 'Отель успешно добавлен!');}


    public function destroy(Hotel $hotel)
    {
        if ($hotel->image) {
            Storage::disk('public')->delete($hotel->image);
        }

        $hotel->delete();

        return redirect()->route('hotels.index')->with('success', 'Отель удален.');
    }
}
