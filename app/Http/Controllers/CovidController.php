<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Area;
use App\Models\Covid;

class CovidController extends Controller
{
    const view = 'admin.covid.';

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $active = 'index';
        $areas = Area::orderBy('name', 'asc')->get();
        $query = Covid::query();

        if($request->area_id){
            $query = $query->where('area_id', $request->area_id);
        }
 
        if($request->date){
            $query = $query->whereDate('date', $request->date);
        }
        $covids = $query->with('area')->get();
        return view(self::view.'index', compact('active', 'covids', 'areas'));
    }

    public function create()
    {
        $active = 'create';
        $areas = Area::orderBy('name', 'asc')->get();
        return view(self::view.'create', compact('active', 'areas'));
    }

    public function store(Request $request)
    {
        try {
            $covid = new Covid();
            $covid->area_id = $request->area_id;
            $covid->community_case = $request->community_case ? $request->community_case : 0;
            $covid->foreigner_case = $request->foreigner_case ? $request->foreigner_case : 0;
            $covid->dead_case = $request->dead_case ? $request->dead_case : 0;
            $covid->date = $request->date ? DateTimeFormat($request->date) : '';
            if($covid->save()){
                return redirect()->route('admin.covid.index');
            }
            return redirect()->back()->with('error', 'Something went wrong, try again!'); 
        } catch (\Exception $e) {
            throw ($e);
        }

    }
}
