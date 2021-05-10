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
                'name'  => 'Infection New'
            ],[
                'name'  => 'Heal'
            ],[
                'name'  => 'Being Treated'
            ],[
                'name'  => 'Dead'
            ]
        ]);
    }
}
