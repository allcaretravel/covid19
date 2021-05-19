<?php

namespace App\Http\Controllers;

use App\Http\Requests\CovidCaseRequest;
use App\Http\Requests\ProvinceStoreRequest;
use App\Models\Models\CovidCase;
use App\Models\Models\Province;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BackendController extends Controller
{
    public function entry()
    {
        return view('case-entry');
    }

    public function storeEntry(CovidCaseRequest $request)
    {
        $input = $request->validated();
        $input['date'] = date('Y-m-d',strtotime($input['date']));
        CovidCase::create($input);
        return redirect('/listing');
    }

    public function caseListing(Request $request)
    {
        $query = CovidCase::query();
        if($request->isMethod('POST'))
        {
            $query->search($request->province_id,$request->date);
        }
        $case = $query->select('province_id','date',
            DB::raw("SUM(total) AS total"),
            DB::raw("SUM(recovered) AS recovered"),
            DB::raw("SUM(deaths) AS deaths"),
            DB::raw("SUM(community_case) AS community_case"),
            DB::raw("SUM(foreigner_case) AS foreigner_case")
        )->groupBy('province_id')->groupBy('date')->get();
        $sum_case = $case->sum('total');
        $sum_deaths = $case->sum('deaths');
        $sum_recovered = $case->sum('recovered');
        $sum_community = $case->sum('community_case');
        $sum_foreigner = $case->sum('foreigner_case');
        return view('case-listing',compact('case','sum_case','sum_deaths','sum_recovered','sum_community','sum_foreigner'));
    }
    public function createProvince()
    {
        return view('create-province');
    }
    public function storeProvince(ProvinceStoreRequest $request)
    {
        Province::insert([
           'name' => $request->name
        ]);
        return redirect('/provinces');
    }
    public function provinceList()
    {
        $provinces = Province::select('name')->get();
        return view('provinces',compact('provinces'));
    }
}
