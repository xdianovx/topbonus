<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CasinoRating extends Model
{
    use HasFactory;
    protected $fillable = [
    'rate',
    'casino_fairness',
    'withdrawal_credibility',
    'promotions_and_bonuses',
    'games_variety_and_graphics',
    'support_professionality',
    'review_title',
    'review_text',
    'image'
];
public function casino()
{
    return $this->belongsTo(Casino::class);
    
}
}
