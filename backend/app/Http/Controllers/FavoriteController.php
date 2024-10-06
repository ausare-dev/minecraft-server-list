<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    public function getUserFavorites()
    {
        $user = Auth::user();

        $favorites = $user->favorites()->with('categories')->get();

        return response()->json([
            'user' => $user,
            'favorites' => $favorites,
        ]);
    }
}


