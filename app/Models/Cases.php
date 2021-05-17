<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Province;
use App\Models\Area;


class Cases extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'province_id', 'area_id', 'infection_type', 'heal', 'curing', 'infection', 'death'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function province()
    {
        return $this->belongsTo(Province::class, 'province_id');
    }

    public function area()
    {
        return $this->belongsTo(Area::class, 'area_id');
    }

}
