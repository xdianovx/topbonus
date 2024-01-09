<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Casino extends Model
{
    use HasFactory;
    protected $fillable = ['title','slug','link','logo','description'];
    public function getRouteKeyName()
    {
        return 'slug';
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
        
    }
    public function seo_meta()
    {
        return $this->morphOne(SeoMeta::class, 'seo_metaable');
    }
    public function bonus_cards()
    {
      return $this->hasMany(BonusCard::class);
    }
    public function licenses()
    {
      return $this->hasMany(LicensesOrgs::class);
    }
    public function certificates()
    {
      return $this->hasMany(CertificatesOrgs::class);
    }
    public function available_languages()
    {
      return $this->hasMany(Country::class);
    }
    public function countries()
    {
      return $this->hasMany(Country::class);
    }
    public function features()
    {
      return $this->hasMany(CasinoFeatures::class);
    }
    public function game_types()
    {
      return $this->hasMany(GameType::class);
    }
    public function software_providers()
    {
      return $this->hasMany(Soft::class);
    }
    public function rating()
    {
      return $this->hasMany(CasinoRating::class);
    }
}
