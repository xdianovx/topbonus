<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LicensesOrgs extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'logo',
        'link'
    ];
    public static $licenses_routes = [
        'admin.licenses.index',
        'admin.licenses.search',
        'admin.licenses.show',
        'admin.licenses.edit',
        'admin.licenses.create',
    ];
    public function casinos()
    {
        return $this->hasMany(Casino::class);
        
    }
}
