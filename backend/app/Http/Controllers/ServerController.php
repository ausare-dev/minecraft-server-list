<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Server;

class ServerController extends Controller
{
    public function index()
    {
        $servers = Server::with(['categories', 'ratings'])
            ->get()
            ->map(function ($server) {
                $server->rating = round($server->ratings()->avg('rating'));
                return $server;
            });

        return response()->json($servers);
    }
}
