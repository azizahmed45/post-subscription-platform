<?php

namespace App\Http\Controllers;

use App\Models\Website;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:1000',
            'content' => 'required|string|max:33000',
            'website_id' => 'required|exists:websites,id',
        ]);

        $website = Website::find($data['website_id']);

        $website->posts()->create([
            'title' => $data['title'],
            'slug' => Str::slug($data['title']),
            'content' => $data['content'],
        ]);

        return response()->json([
            'message' => 'Post created successfully',
        ], 201);
    }
}
