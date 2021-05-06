<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class CovidList extends Model
{
    use HasFactory;

    protected $table = 'listcovid';

    public function sumAmount()
    {
        return DB::table('listcovid')->sum('amount');
    }

    public function sumArea()
    {
        return DB::table('listcovid')
            ->select('area', DB::raw('sum(amount) as Amount'))
            ->groupBy('area')
            ->get();
    }

    public function sumProvince()
    {
        return DB::table('listcovid')
            ->select('province', DB::raw('sum(amount) as Amount'))
            ->groupBy('province')
            ->get();
    }

    public function sumCase()
    {
        return DB::table('listcovid')
            ->select('case', DB::raw('sum(amount) as Amount'))
            ->groupBy('case')
            ->get();
    }
}
