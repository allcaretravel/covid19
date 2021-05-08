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
        $sum = CovidList::sum('amount');
        return $sum;
    }

    public function sumArea()
    {
        $sum = CovidList::select('area', DB::raw('sum(amount) as Amount'))
                        ->groupBy('area')
                        ->get();
        return $sum;
    }

    public function sumProvince()
    {
        $sum = CovidList::select('province', DB::raw('sum(amount) as Amount'))
                        ->groupBy('province')
                        ->get();
        return $sum;
    }

    public function sumCase()
    {
        $sum = CovidList::select('case', DB::raw('sum(amount) as Amount'))
            ->groupBy('case')
            ->get();
        return $sum;
    }
}
