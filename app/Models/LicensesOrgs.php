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
        'link',
        'casino_id'
    ];
    public static $licenses_routes = [
        'admin.licenses.index',
        'admin.licenses.search',
        'admin.licenses.show',
        'admin.licenses.edit',
        'admin.licenses.create',
    ];
    public function casino()
    {
        return $this->belongsTo(Casino::class);
        
    }
}
