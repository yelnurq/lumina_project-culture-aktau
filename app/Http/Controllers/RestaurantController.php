<?php
namespace App\Http\Controllers;

use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Laravel\Facades\Image;

class RestaurantController extends Controller
{
    public function index()
    {
        $restaurants = Restaurant::orderBy('title_ru')->paginate(9);
        $allRestaurants = Restaurant::all(); // для карты

        return view('restaurants.index', compact('restaurants', 'allRestaurants'));
    }

    public function show($id)
    {
        $restaurant = Restaurant::findOrFail($id);
        return view('restaurants.show', compact('restaurant'));
    }

    public function create()
    {
        return view('restaurants.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title_ru' => 'required|string|max:255',
            'title_en' => 'nullable|string|max:255',
            'title_kk' => 'nullable|string|max:255',
            'description_ru' => 'nullable|string',
            'description_en' => 'nullable|string',
            'description_kk' => 'nullable|string',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'image' => 'nullable|image|max:5120',
        ]);

        $imagePath = null;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = uniqid() . '.webp';
            $pathToSave = storage_path('app/public/restaurants/' . $filename);

            Image::read($image)
                ->save($pathToSave, quality: 60);

            $imagePath = 'restaurants/' . $filename;
        }

        Restaurant::create(array_merge($validated, ['image' => $imagePath]));

        return redirect()->back()->with('success', 'Ресторан добавлен!');
    }

    public function destroy(Restaurant $restaurant)
    {
        if ($restaurant->image) {
            Storage::disk('public')->delete($restaurant->image);
        }

        $restaurant->delete();

        return redirect()->route('admin.restaurants.index')->with('success', 'Ресторан удален.');
    }
}
