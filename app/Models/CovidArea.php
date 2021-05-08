<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\CovidProvince;
use DB;

class CovidArea extends Model
{
    use HasFactory;

    protected $table = 'areas as a';

    public function province()
    {
        return $this->belongsTo(CovidProvince::class, 'area_id');
    }

    public function JoinData()
    {
        return DB::table('areas as a')
                ->leftjoin('provinces AS p', 'p.area_id', '=', 'a.id')
                ->select('a.name As area_name', 'p.name As province_name')
                ->groupBy('a.name')
                ->get();
    }
    
    public function JoinFetch()
    {
        return DB::table('areas as a')
                ->leftjoin('provinces AS p', 'p.area_id', '=', 'a.id')
                ->select('a.name As area_name', 'p.name As province_name');
                
    }
}
