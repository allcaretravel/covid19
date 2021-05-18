<?php

namespace Database\Seeders;

use App\Models\Models\CovidCaseModel;
use Illuminate\Database\Seeder;

class CovidCaseTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'province_id' => 1,
                'community_case' => 50,
                'foreigner_case' => 5,
                'total' => 300,
                'deaths' => 5,
                'recovered' => 5,
                'date' => date('Y-m-d')
            ],
            [
                'province_id' => 2,
                'community_case' => 50,
                'foreigner_case' => 5,
                'total' => 300,
                'deaths' => 5,
                'recovered' => 5,
                'date' => date('Y-m-d')
            ],
        ];
        CovidCaseModel::insert($data);
    }
}
