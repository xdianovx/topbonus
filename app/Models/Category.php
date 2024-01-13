<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['title','slug','image','description','description_footer'];
    public static $categories_routes = [
      'admin.categories.index',
      'admin.categories.search',
      'admin.categories.show',
      'admin.categories.edit',
      'admin.categories.create',
  ];
    public function getRouteKeyName()
    {
        return 'slug';
    }
    public function casinos()
    {
      return $this->hasMany(Casino::class);
    }
    public function bonus_cards()
    {
      return $this->hasMany(BonusCard::class);
    }
}
