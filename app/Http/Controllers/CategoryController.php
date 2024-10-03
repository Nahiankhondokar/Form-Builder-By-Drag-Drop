<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryStoreRequest;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index(): View
    {
        return view('category.store');
    }
    
    public function store(CategoryStoreRequest $request): RedirectResponse
    {
        Category::create([
            'name'      => $request->name,
            'slug'      => Str::slug($request->name),
            'user_id'   => auth()->user()->id
        ]);

        return redirect()->route('dashboard')->with('success', 'Store successfully');
    }
}
