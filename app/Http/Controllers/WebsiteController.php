<?php

namespace App\Http\Controllers;

use App\Models\Website;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    public function subscribe(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:subscriptions,email',
            'website_id' => 'required|exists:websites,id',
        ]);

        $website = Website::find($request->website_id);

        $website->subscribers()->create([
            'email' => $request->email,
        ]);

        return response()->json([
            'message' => 'Subscribed successfully',
        ], 201);
    }
}
