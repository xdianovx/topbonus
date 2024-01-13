<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Soft extends Model
{
    use HasFactory;
    protected $fillable = ['title','slug','link','logo','description','casino_id','description_footer'];
    public static $softs_routes = [
        'admin.softs.index',
        'admin.softs.search',
        'admin.softs.show',
        'admin.softs.edit',
        'admin.softs.create',
    ];
    public function getRouteKeyName()
    {
        return 'slug';
    }
    public function casino()
    {
        return $this->belongsTo(Casino::class);
        
    }
}
