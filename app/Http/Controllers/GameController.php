<?php

namespace App\Http\Controllers;

use App\Models\Game as Games;
use Inertia\Inertia;
use Inertia\Response;

class GameController extends Controller
{
    private Games $games;

    public function __construct(Games $games)
    {
        $this->games = $games;
    }

    public function loadView(): Response
    {
        return Inertia::render('Play', self::getGameData());
    }

    private function getGameData(): array
    {
        $data = [];
        $data['games'] = $byWired = $this->games->all();
        return $data;
    }
}
