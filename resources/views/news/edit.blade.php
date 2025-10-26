@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto px-6 py-10 mt-[70px] bg-white rounded-xl shadow">
    <h2 class="text-2xl font-bold mb-6">Редактировать новость</h2>

    @if ($errors->any())
        <div class="mb-4 p-4 bg-red-100 text-red-700 rounded">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('news.update', $news->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @method('PUT')

        <div>
            <label class="block font-medium mb-1">Заголовок</label>
            <input type="text" name="title" value="{{ old('title', $news->title) }}" required class="w-full border rounded px-4 py-2">
        </div>

        <div>
            <label class="block font-medium mb-1">Описание</label>
            <textarea name="description" rows="5" required class="w-full border rounded px-4 py-2">{{ old('description', $news->description) }}</textarea>
        </div>

        <div>
            <label class="block font-medium mb-1">Новое изображение (если нужно заменить)</label>
            <input type="file" name="image" class="w-full">
            @if ($news->image)
                <img src="{{ asset('storage/' . $news->image) }}" alt="Текущее изображение" class="mt-4 h-40 rounded">
            @endif
        </div>

        <div class="text-right">
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-2 rounded">
                Обновить
            </button>
        </div>
    </form>
</div>
@endsection
