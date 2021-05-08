<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Input;
use Validator;
use Redirect;
use DB;
use App\Models\CovidArea;
use App\Models\CovidList;
use App\Models\CovidCase;
use App\Models\CovidProvince;
use App\Http\Requests\CreateBackendRequest;

class BackendController extends Controller
{
    public function store(CreateBackendRequest $request)
    {        
            $store = new CovidList();
            $store->area        = $request->input('area');
            $store->province    = $request->input('province');
            $store->case    = $request->input('case');
            $store->date    = $request->input('date');
            $store->amount    = $request->input('amount');

            $store->save();
            return Redirect::to('entry')->with('success', 'successfully submited');
            
    }

    public function displayEntry()
    {
        $case = CovidCase::get();       
        $join = new CovidArea;
        $value = $join->JoinData();
        
        return view('entry' ,
                    [
                        'value' => $value,
                        'case' => $case,                    
                    ]);
    }

    public function fetch(Request $request)
    {
        $select = $request->get('select');
        $value = $request->get('value');
        $dependent = $request->get('dependent');  
        $join = new CovidArea;
        $data = $join->JoinFetch()
                      ->where($select, $value)
                      ->groupBy($dependent)
                      ->get();

        $output = '<option value="">Select Province</option>';
        foreach($data as $row)
        {
            $output .= '<option value="'.$row->$dependent.'">'.$row->$dependent.'</option>';
        }
        echo $output;
    }

    public function displayListing()
    {         
        $sum_amount = new CovidList;
        $total = $sum_amount->sumAmount();
        $totalArea = $sum_amount->sumArea();
        $totalProvince = $sum_amount->sumProvince();
        $totalCase = $sum_amount->sumCase();

        $list = Covidlist::paginate(5);
        return view('listing', 
                    [
                        'list' => $list,
                        'total'=> $total,
                        'sum_area'=> $totalArea,
                        'sum_province'=> $totalProvince,
                        'sum_case'=> $totalCase,
                    ]);
    }

    public function search(Request $request)
    {
        $sum_amount = new CovidList;
        $total = $sum_amount->sumAmount();
        $totalArea = $sum_amount->sumArea();
        $totalProvince = $sum_amount->sumProvince();
        $totalCase = $sum_amount->sumCase();

        $search_text = $request->get('search');
        $list = CovidList::where('area', 'LIKE', '%' . $search_text . '%')
                        ->orwhere('province', 'LIKE', '%' . $search_text . '%')  
                        ->orwhere('case', 'LIKE', '%' . $search_text . '%')  
                        ->orwhere('date', 'LIKE', '%' . $search_text . '%')  
                        ->paginate(5);
        
        return view('listing',
                     [
                         'list' => $list, 
                         'total'=> $total,
                         'sum_area'=> $totalArea,
                         'sum_province'=> $totalProvince,
                         'sum_case'=> $totalCase,
                    ]);
    }
}
