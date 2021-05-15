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
                'name'  => '7makara',
                'province_id' => '1'
            ],[
                'name'  => 'ToulKok',
                'province_id' => '1'
            ],[
                'name'  => 'DonPenh',
                'province_id' => '1'
            ],[
                'name'  => 'Dongkou',
                'province_id' => '1'
            ],[
                'name'  => 'MeanChey',
                'province_id' => '1'
            ],[
                'name'  => 'RerSeyKao',
                'province_id' => '1'
            ],[
                'name'  => 'PorSenChey',
                'province_id' => '1'
            ],[
                'name'  => 'SenSok',
                'province_id' => '1'
            ],[
                'name'  => 'ChomKaMon',
                'province_id' => '1'
            ],[
                'name'  => 'ChbarOmPov',
                'province_id' => '1'
            ],[
                'name'  => 'ChroyChongVar',
                'province_id' => '1'
            ],[
                'name'  => 'PrekPnov',
                'province_id' => '1'
            ],[
                'name'  => 'SrokTrang',
                'province_id' => '2'
            ],[
                'name'  => 'TramKok',
                'province_id' => '2'
            ],[
                'name'  => 'KosOnDeat',
                'province_id' => '2'
            ],[
                'name'  => 'Kirivong',
                'province_id' => '2'
            ],[
                'name'  => 'Baty',
                'province_id' => '2'
            ],[
                'name'  => 'BoryJolsa',
                'province_id' => '2'
            ],[
                'name'  => 'Preykabas',
                'province_id' => '2'
            ],[
                'name'  => 'Somrong',
                'province_id' => '2'
            ],[
                'name'  => 'Ongkobory',
                'province_id' => '2'
            ]
        ]);
    }
}
