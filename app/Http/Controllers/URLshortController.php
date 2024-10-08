<?php

namespace App\Http\Controllers;

use App\Http\Requests\URLStoreRequest;
use App\Models\URLshort;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class URLshortController extends Controller
{
    public function index(): View
    {
        return view('url.index');
    }

    public function store(URLStoreRequest $request): RedirectResponse
    {
        $url = URLshort::generateShortUrl($request->original_url);

        return redirect()->back()->with([
            'success' => 'Created successfully',
            'original_url'     => $url->original_url,
            'shortened_url'    => $url->shortened_url,
        ]);
    }

    public function redirect(string $shortenedUrl)
    {
        $shortUrl = URLshort::where('shortened_url', $shortenedUrl)->firstOrFail();
        if($shortUrl){
            $shortUrl->count = $shortUrl->count + 1;
            $shortUrl->save();
        }
        
        return redirect($shortUrl->original_url);
    }

    public function delete($id): RedirectResponse
    {
        URLshort::query()->find($id)->delete();
        return redirect()->back()->with('success', 'Delete successfully');
    }
}