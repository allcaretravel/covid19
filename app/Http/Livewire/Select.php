<?php

namespace App\Http\Livewire;

use App\Models\Province;
use App\Models\Area;
use Livewire\Component;

class Select extends Component
{
    public $countryc;
    public $areas = [];
    public $area;   
    
    public function render()
    {
        if(!empty($this->countryc)) {
            $this->areas = Area::where('province_id', $this->countryc)->get();
        }

        $countries = Province::orderBy('name')->get();

        return view('livewire.select')->with([
                'countries' => $countries
        ]);
    }
}