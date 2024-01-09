<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Soft extends Model
{
    use HasFactory;
    protected $fillable = ['title','slug','link','logo','description'];
    public function getRouteKeyName()
    {
        return 'slug';
    }
    public function casino()
    {
        return $this->belongsTo(Casino::class);
        
    }
}
