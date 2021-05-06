<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Input;
use Validator;
use Redirect;
use App\Models\CovidEntry;
use App\Models\CovidList;
use App\Models\CovidCase;
use DB;

class BackendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $store = new CovidList();

        $data=Input::except(array('_token'));
        
        $rule = array(
            'area'     =>  'required',
            'province'  =>  'required',
            'case'  =>  'required',
            'date'  =>  'required',
            'amount'  =>  'required',
        );

        $validator = Validator::make($data, $rule);

        if($validator->fails()){

            return Redirect::to('entry')->withErrors($validator);
        }else{
            
            $store->area        = $request->input('area');
            $store->province    = $request->input('province');
            $store->case    = $request->input('case');
            $store->date    = $request->input('date');
            $store->amount    = $request->input('amount');

            $store->save();
            return Redirect::to('entry')->with('success', 'successfully submited');
        }
            
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function displayEntry(){
        $case = CovidCase::get();
        $value = CovidEntry::join('province AS p', 'p.area_id', '=', 'a.area_id')
            ->select('a.area_name', 'p.province_name')
            ->groupBy('a.area_name')
            ->get();
        return view('entry' ,
                    [
                        'value' => $value,
                        'case' => $case,                    
                    ]);
    }

    public function fetch(Request $request){
        $select = $request->get('select');
        $value = $request->get('value');
        $dependent = $request->get('dependent');
        $data = CovidEntry::join('province AS p', 'p.area_id', '=', 'a.area_id')
                ->select('a.area_name', 'p.province_name')
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

    public function displayListing(){         

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

    public function search(Request $request){
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
