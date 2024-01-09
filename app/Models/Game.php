<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;
    protected $fillable = ['title','slug','image','description'];
    public function getRouteKeyName()
    {
        return 'slug';
    }
    public function bonus_card()
    {
        return $this->belongsTo(BonusCard::class);
        
    }
    public function game_type()
    {
        return $this->belongsTo(GameType::class);
        
    }
}
