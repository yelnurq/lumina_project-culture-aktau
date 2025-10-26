<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Laravel\Facades\Image;

class NewsController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|max:5120', 
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = uniqid() . '.webp'; 

            $path = storage_path('app/public/news/' . $filename);

            Image::read($image)
                ->save($path, quality: 55);


            $validated['image'] = 'news/' . $filename;
        }

        News::create($validated);

        return redirect()->route('news.index')->with('success', 'Новость добавлена.');
    }

    public function index(Request $request)
    {
        $query = News::query();

        if ($request->has('q') && $request->q) {
            $searchTerm = $request->q;
            $query->where('title', 'like', "%{$searchTerm}%")
                ->orWhere('description', 'like', "%{$searchTerm}%");
        }

        $news = $query->orderByDesc('created_at')->paginate(12)->withQueryString(); 

        return view('news.index', compact('news'));
    }

    public function welcome()
    {
        $news = News::orderByDesc('date')->take(3)->get();
        return view('welcome', compact('news'));
    }

    public function create()
    {
        return view('news.create');
    }


public function show(News $news)
{
    $relatedNews = News::where('id', '!=', $news->id)
        ->latest()
        ->take(4)
        ->get();

    return view('news.show', compact('news', 'relatedNews'));
}


    public function edit(News $news)
    {
        return view('news.edit', compact('news'));
    }

    public function update(Request $request, News $news)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            if ($news->image) {
                Storage::disk('public')->delete($news->image);
            }
            $validated['image'] = $request->file('image')->store('news', 'public');
        }

        $news->update($validated);

        return redirect()->route('news.index')->with('success', 'Новость обновлена.');
    }

    public function destroy(News $news)
    {
        if ($news->image) {
            Storage::disk('public')->delete($news->image);
        }
        $news->delete();
        return redirect()->route('admin.index')->with('success', 'Новость удалена.');
    }
}
