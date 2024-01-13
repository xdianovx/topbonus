<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CertificatesOrgs extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'logo',
        'link',
        'casino_id'
    ];
    public static $certificates_routes = [
        'admin.certificates.index',
        'admin.certificates.search',
        'admin.certificates.show',
        'admin.certificates.edit',
        'admin.certificates.create',
    ];
    
    public function casino()
    {
        return $this->belongsTo(Casino::class);
        
    }
}
