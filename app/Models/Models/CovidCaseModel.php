<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class CovidCaseModel extends Model
{
    use HasFactory;

    protected $table = 'covid_case';

    protected $fillable = ['province_id','community_case','foreigner_case','total','recovered','deaths','date'];

    public function province()
    {
        return $this->belongsTo(ProvinceModel::class,'province_id');
    }
}
