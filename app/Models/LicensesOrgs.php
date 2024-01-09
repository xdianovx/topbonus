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
    public function casino()
    {
        return $this->belongsTo(Casino::class);
        
    }
}
