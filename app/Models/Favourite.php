<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favourite extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'user_id',
        'game_id'
    ];

    public function user() {
        return $this->belongsTo(User::class, 'foreign_key');
    }

    public function game() {
        return $this->belongsTo(Game::class, 'foreign_key');
    }
}
