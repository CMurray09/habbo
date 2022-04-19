<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Inertia\Response;

class PlayController extends Controller
{
    public function loadView(): Response
    {
        return Inertia::render('Play');
    }
}
