<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\FormTemplate;
use App\Models\RouteName;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index (): View
    {
        $authId = auth()->user()->id;

        $categories = Category::with('user')
        ->when(auth()->user()->role == 'organizer', function($q) use ($authId){
            $q->where('user_id', $authId);
        })
        ->orderByDesc('id')
        ->get();

        $templates = FormTemplate::with('user')
        ->when(auth()->user()->role == 'organizer', function($q) use ($authId){
            $q->where('user_id', $authId);
        })
        ->orderByDesc('id')
        ->get();

        $routes = RouteName::with('user')
        ->when(auth()->user()->role == 'organizer', function($q) use ($authId){
            $q->where('user_id', $authId);
        })
        ->orderByDesc('id')
        ->get();
    
        return view('dashboard', [
            'categories' => $categories,
            'templates' => $templates,
            'routes'    => $routes,
        ]);
    }
}
