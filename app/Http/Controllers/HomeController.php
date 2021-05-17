<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Province;
use App\Models\Cases;
use Redirect;
use App\Http\Requests\CreateHomeRequest;

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
        return view('home');
    }

    
    public function store(CreateHomeRequest $request){

        Cases::create([
            'user_id'      => auth()->user()->id,
            'province_id'    => $request->input('province'),
            'area_id'     => $request->input('area'),
            'infection_type' => $request->input('infec'),
            'heal'    => $request->input('heal'),
            'curing'    => $request->input('curing'),
            'infection'    => $request->input('infection'),
            'death'    => $request->input('death'),
        ]);

        return Redirect::to('home')->with('success', 'successfully submited');
    }

    public function show()
    {
        $data = Cases::simplePaginate(8);
        return view('showlist', ['data' => $data]);
    }
}
