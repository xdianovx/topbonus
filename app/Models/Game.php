<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;
    protected $fillable = ['title','slug','image','description','game_type_id'];
    public static $games_routes = [
        'admin.games.index',
        'admin.games.search',
        'admin.games.show',
        'admin.games.edit',
        'admin.games.create',
    ];
    public function getRouteKeyName()
    {
        return 'slug';
    }
    public function bonus_cards()
    {
        return $this->belongsToMany(BonusCard::class);
        
    }
    public function game_type()
    {
        return $this->belongsTo(GameType::class);
        
    }
}
