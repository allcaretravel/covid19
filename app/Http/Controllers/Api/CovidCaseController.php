<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CovidCaseResource;
use App\Models\Models\CovidCase;
use Illuminate\Http\Request;

class CovidCaseController extends Controller
{
    public function listing(Request $request)
    {
        $province = $request->input('province');
        $date = $request->input('date');
        $covid_case = CovidCase::search($province,$date)->get();
        return CovidCaseResource::collection($covid_case);
    }
}
