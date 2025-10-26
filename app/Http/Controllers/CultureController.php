<?php

namespace App\Http\Controllers;

use App\Models\Culture;
use App\Models\Category;
use App\Models\News;
use App\Models\Region;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Laravel\Facades\Image;

class CultureController extends Controller
{

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

    $cultures = $query->orderBy('title')->paginate(9)->withQueryString();
    $categories = Category::all();

    return view('cultures.index', compact('cultures', 'categories', 'allCultures'));
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
        $culture = Culture::with('category')->findOrFail($id);
        return view('cultures.show', compact('culture'));
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
    ]);

    $path = null;

    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $filename = uniqid() . '.webp';
        $pathToSave = storage_path('app/public/cultures/' . $filename);

        Image::read($image)
            ->save($pathToSave, quality: 60); 

        $path = 'cultures/' . $filename;
    }

    Culture::create([
        'title' => $validated['title'],
        'description' => $validated['description'],
        'category_id' => $validated['category_id'],
        'latitude' => $validated['latitude'],
        'longitude' => $validated['longitude'],
        'image' => $path,
    ]);

    return redirect()->back()->with('success', 'Объект добавлен!');
}
    
    public function destroy(Culture $culture)
    {
        if ($culture->image) {
            Storage::disk('public')->delete($culture->image);
        }
        $culture->delete();
        return redirect()->route('admin.index')->with('success', 'Новость удалена.');
    }
}
