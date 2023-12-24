<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Casino extends Model
{
    use HasFactory;

    protected $guarded = false;

    public function bonus(): HasMany
    {
        return $this->hasMany(Bonus::class);
    }
}
