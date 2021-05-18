<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CovidCaseResource;
use App\Models\Models\CovidCaseModel;
use Illuminate\Http\Request;

class CovidCaseController extends Controller
{
    public function listing(Request $request)
    {
        $province = $request->input('province');
        $date = $request->input('date');
        $covid_case = CovidCaseModel::when($province,function ($q) use($province){
            $q->where('province_id',$province);
        })->when($date,function ($q) use($date){
            $q->where('date',date('Y-m-d',strtotime($date)));
        })->get();
        return CovidCaseResource::collection($covid_case);
    }
}
