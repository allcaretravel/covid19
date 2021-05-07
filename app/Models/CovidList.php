<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class CovidList extends Model
{
    use HasFactory;

    protected $table = 'listcovids';

    public function sumAmount()
    {
        return DB::table('listcovids')->sum('amount');
    }

    public function sumArea()
    {
        return DB::table('listcovids')
            ->select('area', DB::raw('sum(amount) as Amount'))
            ->groupBy('area')
            ->get();
    }

    public function sumProvince()
    {
        return DB::table('listcovids')
            ->select('province', DB::raw('sum(amount) as Amount'))
            ->groupBy('province')
            ->get();
    }

    public function sumCase()
    {
        return DB::table('listcovids')
            ->select('case', DB::raw('sum(amount) as Amount'))
            ->groupBy('case')
            ->get();
    }
}
