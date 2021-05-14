<?php

namespace App\Http\Livewire;

use App\Models\Province;
use App\Models\Area;
use Livewire\Component;

class Select extends Component
{
    public $country;  //wire:model is not work
    public $areas = [];
    public $area;   
    
    public function render()
    {
        if(!empty($this->country)) {
            $this->areas = Area::where('povince_id', $this->country)->get();
        }

        $countries = Province::orderBy('name')->get();
        // $areas = Area::orderBy('name')->get();

        return view('livewire.select')->with([
                'countries' => $countries,
                // 'areas' => $areas
        ]);
    }
    
}
