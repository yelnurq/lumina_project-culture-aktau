<?php

namespace App\Http\Controllers;

use App\Models\Culture;
use App\Models\Category;
use App\Models\Hotel;
use App\Models\News;
use App\Models\Region;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Laravel\Facades\Image;

class CultureController extends Controller
{

public function search(Request $request)
{
    $query = $request->input('query');
    
    $results = Culture::where('title', 'LIKE', "%{$query}%")
                ->orWhere('description', 'LIKE', "%{$query}%")
                ->get();

    return view('cultures.index', compact('results', 'query'));
}

public function index(Request $request)
{
    $query = Culture::with('category');

    if ($request->filled('search')) {
        $query->where('title', 'like', '%' . $request->search . '%');
    }

    if ($request->filled('category')) {
        $query->whereHas('category', function ($q) use ($request) {
            $q->where('name', $request->category);
        });
    }

    $allCultures = $query->get();

    $cultures = $query->orderBy('title')->paginate(1)->withQueryString();
    $categories = Category::all();
$randomHotels = \App\Models\Hotel::inRandomOrder()->take(3)->get();
    $randomRestaurants = \App\Models\Restaurant::inRandomOrder()->take(3)->get();

    return view('cultures.index', compact('cultures', 'categories', 'randomHotels', 'randomRestaurants'));
}


    public function welcome()
    {
        $news = News::orderByDesc('created_at')->take(3)->get();
        $cultures = Culture::with('category')->get();
        return view('welcome', compact('cultures', 'news'));
    }

    public function create()
    {
        $categories = Category::all();
        $regions = Region::all();
        return view('cultures.create', compact('categories', 'regions'));
    }

    public function show($id)
    {
        $culture = Culture::with(['category', 'images'])->findOrFail($id);

        $relatedCultures = Culture::where('id', '!=', $id)
            ->inRandomOrder()
            ->take(3)
            ->get();

        return view('cultures.show', compact('culture', 'relatedCultures'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'category_id' => 'required|exists:categories,id',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'image' => 'nullable|image|max:5120',
            'images.*' => 'nullable|image|max:5120', 
            'youtube_link' => 'nullable|url',
        ]);

        $mainImagePath = null;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = uniqid() . '.webp';
            $pathToSave = storage_path('app/public/cultures/' . $filename);

            Image::read($image)
                ->save($pathToSave, quality: 60); 

            $mainImagePath = 'cultures/' . $filename;
        }

        $culture = Culture::create([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'category_id' => $validated['category_id'],
            'latitude' => $validated['latitude'],
            'longitude' => $validated['longitude'],
            'image' => $mainImagePath,
            'youtube_link' => $validated['youtube_link'] ?? null,
        ]);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $filename = uniqid() . '.webp';
                $pathToSave = storage_path('app/public/culture_images/' . $filename);

                Image::read($image)
                    ->save($pathToSave, quality: 60);

                $culture->images()->create([
                    'image_path' => 'culture_images/' . $filename
                ]);
            }
        }

        return redirect()->back()->with('success', 'Объект добавлен!');
    }

    public function destroy(Culture $culture)
    {
        if ($culture->image) {
            Storage::disk('public')->delete($culture->image);
        }

        foreach ($culture->images as $img) {
            Storage::disk('public')->delete($img->image_path);
            $img->delete();
        }

        $culture->delete();

        return redirect()->route('admin.index')->with('success', 'Объект удален.');
    }

}
