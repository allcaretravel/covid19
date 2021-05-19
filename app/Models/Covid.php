<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Covid extends Model
{
    protected $fillable = [
        'area_id',
        'community_case',
        'foreigner_case',
        'dead_case',
        'date'
    ];

    public function area()
    {
        return $this->belongsTo(Area::class);
    }
}
