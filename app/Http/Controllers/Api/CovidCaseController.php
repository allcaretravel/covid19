<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Models\CovidCaseModel;
use Illuminate\Http\Request;

class CovidCaseController extends Controller
{
    public function listing(Request $request)
    {
        $province = $request->input('province');
        $date = $request->input('date');
        $listing = CovidCaseModel::where(function ($query) use($province,$date){
            if($province)
            {
                $query->where('province_id',$province);
            }
            if($date)
            {
                $query->where('date',date('Y-m-d',strtotime($date)));
            }
        })->get()->map(function ($list){
           return [
              'date' => $list->date ? date('d-m-Y',strtotime($list->date)) : '',
              'province' => optional($list->province)->name,
              'case' => $list->total ? $list->total : 0,
              'recovered' => $list->recovered ? $list->recovered : 0,
              'deaths' => $list->deaths ? $list->deaths : 0,
              'community_case' => $list->community_case ? $list->community_case : 0,
              'foreigner_case' => $list->community_case ? $list->foreigner_case : 0,
           ];
        });
        return response()->json(['listing' => $listing],200);
    }
}
