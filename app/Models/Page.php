<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;
    protected $fillable = ['title','slug','description'];
    public function getRouteKeyName()
    {
        return 'slug';
    }
    public function seo_meta()
    {
        return $this->morphOne(SeoMeta::class, 'seo_metaable');
    }
}
