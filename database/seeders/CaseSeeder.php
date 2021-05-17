<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class CaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cases')->insert([
            [    
                'user_id'  => '1',
                'province_id'  => '1',
                'area_id'  => '1',
                'infection_type'  => 'Community',
                'heal'  => '2',
                'curing'  => '5',
                'infection'  => '8',
                'death'  => '0'
            ],[
                'user_id'  => '1',
                'province_id'  => '2',
                'area_id'  => '2',
                'infection_type'  => 'Community',
                'heal'  => '7',
                'curing'  => '1',
                'infection'  => '4',
                'death'  => '0'
            ]
        ]);
    }
}
