<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GameType extends Model
{
    use HasFactory;
    protected $fillable = ['title','slug','icon','live','description','description_footer'];
    public static $game_types_routes = [
        'admin.game_types.index',
        'admin.game_types.search',
        'admin.game_types.show',
        'admin.game_types.edit',
        'admin.game_types.create',
    ];
    public function getRouteKeyName()
    {
        return 'slug';
    }
    public function casino()
    {
        return $this->belongsTo(Casino::class);
        
    }
    public function games()
    {
      return $this->hasMany(Game::class);
    }
}
