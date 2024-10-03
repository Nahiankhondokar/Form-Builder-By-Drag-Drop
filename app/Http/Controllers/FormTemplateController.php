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

    public function store(TemplateStoreRequest $request): JsonResponse
    {
        FormTemplate::create([
            'name'      => $request->name,
            'form_template'=> $request->form_template,
            'user_id'   => auth()->user()->id
        ]);

        Redirect::away('http://localhost:8000/dashboard');
        return response()->json([
            'message'  => 'Store successfully'
        ]);
    }
}
