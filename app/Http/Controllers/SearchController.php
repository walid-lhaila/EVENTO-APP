<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Event;
use Illuminate\Http\Request;

class SearchController extends Controller
{


    public function search(Request $request)
    {
        $categories = Category::all();
        $search = $request->input('search');
        $categoryId = $request->input('category');

        $events = Event::when($search, function ($query) use ($search) {
            return $query->where('title', 'like', '%' . $search . '%');
        })
            ->when($categoryId, function ($query) use ($categoryId) {
                return $query->where('category_id', $categoryId);
            })
            ->get();

        return view('client.search', compact('categories', 'events'));
    }
}
