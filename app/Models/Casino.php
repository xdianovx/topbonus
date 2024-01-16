<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Casino extends Model
{
    use HasFactory;
    protected $fillable = [
      'title',
      'slug',
      'link',
      'logo',
      'description',
      'description_footer',
      'license_id',
      'certificate_id'
    ];

    public static $casinos_routes = [
      'admin.casinos.index',
      'admin.casinos.search',
      'admin.casinos.show',
      'admin.casinos.edit',
      'admin.casinos.create',
    ];
    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function seo_meta()
    {
        return $this->morphOne(SeoMeta::class, 'seo_metaable');
    }
    public function bonus_cards()
    {
      return $this->hasMany(BonusCard::class);
    }
    public function features()
    {
      return $this->hasMany(CasinoFeatures::class);
    }
 
    public function software_providers()
    {
      return $this->hasMany(Soft::class);
    }
    public function rating()
    {
      return $this->hasMany(CasinoRating::class);
    }
    //belongsTo
    public function license()
    {
      return $this->belongsTo(LicensesOrgs::class);
    }
    public function certificate()
    {
      return $this->belongsTo(CertificatesOrgs::class);
    }
    //belongsToMany
    public function available_languages()
    {
      return $this->belongsToMany(Country::class);
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
