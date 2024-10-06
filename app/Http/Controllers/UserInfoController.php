<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\UserInfo;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class UserInfoController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('userinfo.store', compact('categories'));
    }

    public function store(RouteNameStoreRequest $request): RedirectResponse
    {
        UserInfo::create([
            'name'         => $request->name,
            'user_id'      => auth()->user()->id
        ]);

        return redirect()->route('template.index')->with('success', 'Created successfully');
    }

}
