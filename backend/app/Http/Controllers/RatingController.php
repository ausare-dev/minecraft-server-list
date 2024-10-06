<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rating;
use App\Models\Server;
use Illuminate\Support\Facades\Auth;

class RatingController extends Controller
{
    public function rateServer(Request $request, $serverId)
    {
        // Проверяем аутентификацию
        if (!Auth::check()) {
            return response()->json(['message' => 'Unauthenticated.'], 401);
        }

        // Получаем текущего пользователя
        $userId = Auth::id();

        // Проверяем, проголосовал ли пользователь уже за этот сервер
        $existingRating = Rating::where('user_id', $userId)->where('server_id', $serverId)->first();

        if ($existingRating) {
            return response()->json(['message' => 'You have already rated this server.'], 400);
        }

        // Валидация входящих данных
        $request->validate([
            'rating' => 'required|integer|between:-1,1', // Предполагается, что рейтинг может быть только -1 или 1
        ]);

        // Сохраняем новый рейтинг
        Rating::create([
            'user_id' => $userId,
            'server_id' => $serverId,
            'rating' => $request->input('rating'),
        ]);

        return response()->json(['message' => 'Rating submitted successfully.']);
    }
}

