<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SeoMeta extends Model
{
    use HasFactory;
    protected $fillable = [
    'title',
    'description',
    'og_title',
    'og_description',
    'og_image'
];
public function seo_metaable()
{
    return $this->morphTo();
}
}
