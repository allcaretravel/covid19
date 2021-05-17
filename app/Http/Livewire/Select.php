<?php

namespace App\Http\Livewire;

use App\Models\Province;
use App\Models\Area;
use Livewire\Component;

class Select extends Component
{
    public $province;
    public $areas = [];
    public $area;   
    
    public function render()
    {
        if(!empty($this->province)) {
            $this->areas = Area::where('province_id', $this->province)->get();
        }

        $provinces = Province::orderBy('name')->get();

        return view('livewire.select')->with([
                'provinces' => $provinces
        ]);
    }
}