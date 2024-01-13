<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BonusType extends Model
{
    use HasFactory;
    protected $fillable = ['title','slug','description','description_footer','description_footer'];
    public static $bonus_types_routes = [
      'admin.bonus_types.index',
      'admin.bonus_types.search',
      'admin.bonus_types.show',
      'admin.bonus_types.edit',
      'admin.bonus_types.create',
  ];
    public function getRouteKeyName()
    {
        return 'slug';
    }
    public function bonus_cards()
    {
      return $this->hasMany(BonusCard::class);
    }
    
}
