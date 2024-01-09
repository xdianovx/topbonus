<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BonusType extends Model
{
    use HasFactory;
    protected $fillable = ['title','slug','description'];
    public function getRouteKeyName()
    {
        return 'slug';
    }
    public function bonus_cards()
    {
      return $this->hasMany(BonusCard::class);
    }
    
}
