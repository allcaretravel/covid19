<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CovidCase extends Model
{
    use HasFactory;


    protected $fillable = ['province_id','community_case','foreigner_case','total','recovered','deaths','date'];

    public function province()
    {
        return $this->belongsTo(Province::class,'province_id');
    }

    public function scopeSearch($query,$value1,$value2)
    {
        return $query->when($value1 || $value2,function ($q) use($value1,$value2){
            $q->where('province_id',$value1);
            $q->orWhere('date',strtotime('Y-m-d',strtotime($value2)));
        });
    }
}
