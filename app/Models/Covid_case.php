<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Covid_case extends Model
{
    use HasFactory;
    protected $table = 'covid_case';

    public function get_chart_totalCase()
    {
        $m = date('m');
        return  DB::table('covid_case')
            ->select(DB::raw("strftime('%d',date_add) AS caseByDay, sum(patient_case) as totalCase"))
            ->whereRaw("strftime('%m',date_add) = '$m' ")
            ->groupBy('date_add')
            ->get()
            ->toArray();
    }

    public function getTotal_Treatment()
    {
        return Covid_case::all();
    }
}