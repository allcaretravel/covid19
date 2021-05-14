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
                'name'  => 'Phnom Penh'
            ],[
                'name'  => 'TaKeo'
            ]
        ]);
    }
}
