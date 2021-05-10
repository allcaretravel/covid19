<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class ProvinceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('provinces')->insert([
            [    
                'area_id'  => '1',
                'name'  => 'Phnom Penh'
            ],[
                'area_id'  => '1',
                'name'  => 'Takmao'
            ],[
                'area_id'  => '1',
                'name'  => 'Kondal'
            ],[
                'area_id'  => '1',
                'name'  => 'KomPongSaom'
            ],[
                'area_id'  => '1',
                'name'  => 'Takeo'
            ],[
                'area_id'  => '2',
                'name'  => 'Chaina'
            ],[
                'area_id'  => '2',
                'name'  => 'Vietnam'
            ],[
                'area_id'  => '2',
                'name'  => 'Thailand'
            ],[
                'area_id'  => '2',
                'name'  => 'India'
            ],[
                'area_id'  => '2',
                'name'  => 'Lao'
            ]
        ]);
    }
}
