<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GameType extends Model
{
    use HasFactory;
    protected $fillable = ['title','slug','icon','live','description'];
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
