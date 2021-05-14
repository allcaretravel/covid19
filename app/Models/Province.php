<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Area;
use DB;

class Province extends Model
{
    use HasFactory;

    public function area()
    {
        return $this->belongsTo(Area::class, 'province_id');
    }

    public function JoinData()
    {
        return DB::table('provinces as p')
                ->leftjoin('areas as a', 'a.province_id', '=', 'p.id')
                ->select('p.name As province_name', 'a.name As area_name')
                ->groupBy('p.name')
                ->get();
    }
    
    public function JoinFetch()
    {
        return DB::table('provinces as p')
                ->leftjoin('areas as a', 'a.province_id', '=', 'p.id')
                ->select('p.name As province_name', 'a.name As area_name');
                
    }
}