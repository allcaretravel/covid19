<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Province;
use App\Models\Cases;
use Redirect;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $join = new Province;
        $value = $join->JoinData();
        
        return view('home' ,['value' => $value]);
    }

    
    public function store(Request $request){

        $store = new Cases();
        $store->user_id      = auth()->user()->id;
        $store->province_id    = $request->input('country');
        $store->area_id     = $request->input('area');
        $store->infection_type = $request->input('infec');
        $store->heal    = $request->input('heal');
        $store->curing    = $request->input('curing');
        $store->infection    = $request->input('infection');
        $store->death    = $request->input('death');
        $store->date    = $request->input('date');

        $store->save();
        return Redirect::to('home')->with('success', 'successfully submited');
    }
}
