<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BonusCard extends Model
{
    use HasFactory;
    protected $fillable = [
        'max_cash_out',
        'title',
        'description',
        'slug',
        'bonus_code',
        'wagering',
        'refferal_link',
        'expired_date',
        'like',
        'dislike',
        'used_link',
        'category_id',
        'casino_id',
        'bonus_type_id'
    ];
    public static $bonus_cards_routes = [
        'admin.bonus_cards.index',
        'admin.bonus_cards.search',
        'admin.bonus_cards.show',
        'admin.bonus_cards.edit',
        'admin.bonus_cards.create',
    ];
    public function getRouteKeyName()
    {
        return 'slug';
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
        
    }
    public function casino()
    {
        return $this->belongsTo(Casino::class);
        
    }
    public function bonus_type()
    {
        return $this->belongsTo(BonusType::class);
        
    }
    //belongsToMany
    public function games()
    {
      return $this->belongsToMany(Game::class);
    }
    public function countries()
    {
      return $this->belongsToMany(Country::class);
    }
    public function game_types()
    {
      return $this->belongsToMany(GameType::class);
    }
}
