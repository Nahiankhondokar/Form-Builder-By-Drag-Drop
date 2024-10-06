<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserDataStoreRequest;
use App\Models\Category;
use App\Models\UserInfo;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class UserInfoController extends Controller
{
    public function create()
    {
        $categories = Category::all();
        return view('userinfo.create', compact('categories'));
    }

    public function store(UserDataStoreRequest $request): RedirectResponse
    {
       try {
        UserInfo::create([
            'name'         => $request->name,
            'email'        => $request->email,
            'phone'        => $request->phone,
            'user_id'      => auth()->user()->id,
            'category_id'  => $request->category_id,
            'extra_data'   => $request->extra_data,
        ]);

        return redirect()->route('dashboard')->with('success', 'Created successfully');
       } catch (\Throwable $th) {
        return redirect()->with('error', $th->getMessage());
       }
    }

}
