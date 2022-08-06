<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Inertia\Inertia;
use Inertia\Response;

class GameController extends Controller
{
    public function __construct()
    {}

    public function loadView(): Response
    {
        return Inertia::render('Play', self::getGameData());
    }

    private function getGameData(): array
    {
        $data = [];
        $data['games'] = DB::table('games')->leftJoin('favourites', 'favourites.game_id', '=', 'games.id')->get();
        return $data;
    }
}
