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
                'name'  => 'Community'
            ],[
                'name'  => 'Foreigner'
            ]
        ]);
    }
}
