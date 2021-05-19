<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Area;
use App\Models\Covid;
use App\Http\Resources\CovidResource;

class CovidController extends Controller
{
    const view = 'admin.covid.';

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {

        $query = Covid::query();
        if($request->area_id){
            $query = $query->where('area_id', $request->area_id);
        }
 
        if($request->date){
            $query = $query->whereDate('date', $request->date);
        }
        $covids = $query->with('area')->orderBy('created_at', 'desc')->paginate();
        if($covids){
            return CovidResource::collection($covids);
        }
        return [];
    }
}
