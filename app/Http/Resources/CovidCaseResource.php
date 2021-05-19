<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CovidCaseResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'date' => date('d-m-Y',strtotime($this->date)) ?: '',
            'province' => optional($this->province)->name,
            'case' => $this->total ?: 0,
            'recovered' => $this->recovered ?: 0,
            'deaths' => $this->deaths ?: 0,
            'community_case' => $this->community_case ?: 0,
            'foreigner_case' => $this->community_case ?:0,
        ];
    }
}
