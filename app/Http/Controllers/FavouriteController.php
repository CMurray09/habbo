<?php

namespace App\Http\Controllers;

use App\Models\Favourite as Favourites;
use Illuminate\Support\Facades\Auth;


class FavouriteController extends Controller
{
    private Favourites $favourite;

    public function __construct(Favourites $favourites) {
        $this->favourite = $favourites;
    }

    public function addToFavourites($gameID): string {
        $userID = Auth::id();
        $favouriteGame = $this->favourite
            ->where('user_id', $userID)
            ->where('game_id', $gameID)
            ->exists();
        if ($favouriteGame) {
            try {
                $this->favourite
                    ->where('user_id', $userID)
                    ->where('game_id', $gameID)
                    ->delete();
            } catch (\Exception $e) {
                echo $e->getMessage();
            }
        } else {
            try {
                $favourite = new Favourites();
                $favourite->user_id = $userID;
                $favourite->game_id = $gameID;
                $favourite->save();
            } catch (\Exception $e) {
                echo $e->getMessage();
            }
        }
        return 'Success' . $favouriteGame;
    }
}
