<?php

namespace App\Http\Controllers;

use App\Http\Requests\CovidCaseRequest;
use App\Models\Models\CovidCaseModel;
use App\Models\Models\ProvinceModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BackendController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
    }

    public function entry()
    {
        $province = ProvinceModel::pluck('name','id');
        return view('case-entry',compact('province'));
    }

    public function StoreEntry(CovidCaseRequest $request)
    {
        $input = $request->all();
        $input['date'] = date('Y-m-d',strtotime($input['date']));
        CovidCaseModel::create($input);
        return redirect('/listing');
    }

    public function CaseListing(Request $request)
    {
        $province = ProvinceModel::pluck('name','id');
        $query = CovidCaseModel::query();
        if($request->isMethod('POST'))
        {
            if($request->province_id)
            {
                $query->where('province_id',$request->province_id);
            }
            if($request->date)
            {
                $query->where('date',date('Y-m-d',strtotime($request->date)));
            }
        }
        $sum_case = $query->sum('total');
        $sum_deaths = $query->sum('deaths');
        $sum_recovered = $query->sum('recovered');
        $sum_community = $query->sum('community_case');
        $sum_foreigner = $query->sum('foreigner_case');
        $case = $query->select('province_id','date',
            DB::raw("SUM(total) AS total"),
            DB::raw("SUM(recovered) AS recovered"),
            DB::raw("SUM(deaths) AS deaths"),
            DB::raw("SUM(community_case) AS community_case"),
            DB::raw("SUM(foreigner_case) AS foreigner_case")
        )->groupBy('province_id')->groupBy('date')->get();
        return view('case-listing',compact('case','sum_case','sum_deaths','sum_recovered','sum_community','sum_foreigner','province'));
    }
    public function CreateProvince()
    {
        return view('create-province');
    }
    public function StoreProvince(Request $request)
    {
        $request->validate([
           'name' => 'required|unique:provinces|max:255'
        ]);
        ProvinceModel::insert([
           'name' => $request->name
        ]);
        return redirect('/provinces');
    }
    public function ProvinceList()
    {
        $provinces = ProvinceModel::select('name')->get();
        return view('provinces',compact('provinces'));
    }
}
