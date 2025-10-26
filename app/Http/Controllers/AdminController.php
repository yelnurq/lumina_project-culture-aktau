<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use App\Models\News;
use App\Models\Culture;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index', [
            'news' => News::latest()->paginate(10, ['*'], 'news_page'),
            'cultures' => Culture::latest()->paginate(10, ['*'], 'cultures_page'),
            'messages' => ContactMessage::latest()->paginate(10, ['*'], 'messages_page'),
        ]);
    }
    public function showMessage($id)
    {
        $message = ContactMessage::findOrFail($id);

        return view('admin.messages.show', compact('message'));
    }


}
