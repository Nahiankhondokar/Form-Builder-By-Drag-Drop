<?php

namespace App\Http\Controllers;

use App\Http\Requests\RouteNameStoreRequest;
use App\Models\RouteName;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class RouteNameController extends Controller
{
    public function index(): View
    {
        return view('route.store');
    }

    public function store(RouteNameStoreRequest $request): RedirectResponse
    {
        RouteName::create([
            'name'         => $request->name,
            'user_id'      => auth()->user()->id
        ]);

        return redirect()->route('template.index')->with('success', 'Created successfully');
    }

    public function delete(RouteName $routeName): RedirectResponse
    {
        $routeName->delete();
        return redirect()->back()->with('success', 'Delete successfully');
    }
}
