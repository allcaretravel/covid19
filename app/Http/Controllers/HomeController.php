<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Covid_case;
use App\Models\Area;
use App\Models\Category_case;
use Symfony\Component\Console\Input\Input;
use Illuminate\Support\Facades\DB;


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
        //$area = new Area();
        $areaList = Area::all();
        $covid_case = new Covid_case();
        $sumPatient = Covid_case::sum('patient_case');
        $sumRecover = Covid_case::sum('recover_case');
        $sumDead = Covid_case::sum('dead_case');
        $getData =  DB::table('area')
            ->select(DB::raw("area.area_name, sum(covid_case.patient_case) AS tCase, sum(covid_case.recover_case) AS tRecoverCase, sum(covid_case.dead_case) AS tDeadCase"))
            ->leftjoin('covid_case', 'covid_case.area_id', '=', 'area.id')
            ->groupby('area.area_name')
            ->orderBy('tCase', 'desc')
            ->get();
        $totalcaseDay = $covid_case->get_chart_totalCase();
        return view('home', [
            'sumPatient' => $sumPatient,
            'sumRecover' => $sumRecover,
            'sumDead' => $sumDead,
            'areaList' => $areaList,
            'areaData' => $getData,
            'totalCase_by_day' => $totalcaseDay
        ]);
    }

    public function filterArea(Request $request)
    {
        $output = '';
        $areaid = $request->get('areaid');
        $data  =   DB::table('area')
            ->select(DB::raw("area.area_name, sum(covid_case.patient_case) AS tCase, sum(covid_case.recover_case) AS tRecoverCase, sum(covid_case.dead_case) AS tDeadCase"))
            ->leftjoin('covid_case', 'covid_case.area_id', '=', 'area.id')
            ->where('area.id', $areaid)
            ->groupby('area.area_name')->get();
        $totalTreament = 0;
        foreach ($data as $row) {
            $totalTreament = $row->tCase - ($row->tRecoverCase + $row->tDeadCase);
            $output .= '
            <tr>
            <th> ' . $row->area_name . ' </th>
            <th> ' . $row->tCase . ' </th>
            <th> ' . $totalTreament . ' </th>
            <th> ' . $row->tRecoverCase . ' </th>
            <th> ' . $row->tDeadCase . ' </th>
          </tr>
           ';
        }
        echo json_encode($output);
    }
}