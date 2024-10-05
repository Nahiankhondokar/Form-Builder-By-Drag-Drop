<?php

namespace App\Http\Controllers;

use App\Http\Requests\TemplateStoreRequest;
use App\Models\FormTemplate;
use App\Models\RouteName;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class FormTemplateController extends Controller
{
    public function index(): View
    {
        $routes = RouteName::query()->orderByDesc('id')->get();
        return view('form_template.index', compact('routes'));
    }

    public function show(int $id)
    {
        $template = FormTemplate::query()->with('nameRoute')->findOrFail($id);
        return view('form_template.view', compact('template'));
    }

    public function store(TemplateStoreRequest $request): JsonResponse
    {
        FormTemplate::create([
            'name'         => $request->name,
            'form_template'=> $request->form_template,
            'route_name_id'=> $request->route_name ?? 0,
            'user_id'      => auth()->user()->id
        ]);
        $baseUrl = env('APP_URL');
        Redirect::away("$baseUrl/dashboard");

        return response()->json([
            'message'  => 'Store successfully'
        ]);
    }

    public function delete(FormTemplate $formTemplate): RedirectResponse
    {
        $formTemplate->delete();
        return redirect()->back()->with('success', 'Delete successfully');
    }

}
