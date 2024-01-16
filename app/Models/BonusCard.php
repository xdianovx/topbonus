<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BonusCard extends Model
{
    use HasFactory;
    protected $fillable = [
        'free_spins',
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

    public function country()
    {
      return $this->belongsToMany(Country::class);
    }
    public function rating()
    {
      return $this->hasMany(CasinoRating::class);
    }
    public function seo_meta()
    {
        return $this->morphOne(SeoMeta::class, 'seo_metaable');
    }
    public function games_allowed()
    {
      return $this->hasMany(Game::class);
    }
}
