<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;
    protected $fillable = ['title','country_code','icon'];
    public function casinos()
    {
        return $this->belongsToMany(Casino::class);
        
    }
    public function bonus_cards()
    {
        return $this->belongsToMany(BonusCard::class);
        
    }
}
