<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class AreaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('areas')->insert([
            [    
                'name'  => 'ToulKok',
                'province_id' => '1'
            ],[
                'name'  => 'ChomChav',
                'province_id' => '1'
            ],[
                'name'  => 'SenSok',
                'province_id' => '1'
            ],[
                'name'  => 'MeanChey',
                'province_id' => '1'
            ],[
                'name'  => 'SrokTrang',
                'province_id' => '2'
            ],[
                'name'  => 'TramKok',
                'province_id' => '2'
            ]
        ]);
    }
}
