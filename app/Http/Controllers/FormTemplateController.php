<?php

namespace App\Http\Controllers;

use App\Http\Requests\TemplateStoreRequest;
use App\Models\FormTemplate;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class FormTemplateController extends Controller
{
    public function index(): View
    {
        return view('form_template.index');
    }

    public function show(int $id)
    {
        $template = FormTemplate::findOrFail($id);
        return view('form_template.view', compact('template'));
    }

    public function store(TemplateStoreRequest $request): JsonResponse
    {
        FormTemplate::create([
            'name'      => $request->name,
            'form_template'=> $request->form_template,
            'user_id'   => auth()->user()->id
        ]);
        $baseUrl = env('APP_URL');
        Redirect::away("$baseUrl/dashboard");

        return response()->json([
            'message'  => 'Store successfully'
        ]);
    }
}
