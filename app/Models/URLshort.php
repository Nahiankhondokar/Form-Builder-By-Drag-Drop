<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class URLshort extends Model
{
    use HasFactory;

    protected $guarded = [];

    public static function generateShortUrl($originalUrl)
    {
        $shortenedUrl = Str::random(6); 
        $exitsUrl = self::where('shortened_url', $shortenedUrl)->exists();
        if($exitsUrl){
            $shortenedUrl = Str::random(6);
        }

        return self::create([
            'original_url'  => $originalUrl,
            'shortened_url' => $shortenedUrl,
            'user_id'       => auth()->user()->id,
        ]);
    }
}