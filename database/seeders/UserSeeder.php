<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [    
                'name'  => 'Linda',
                'email' => 'elinda.ear@gmail.com',
                'password'  => '123456'
            ],[
                'name'  => 'Kanha',
                'email' => 'kanha@gmail.com',
                'password'  =>  '123456'
            ]
        ]);
    }
}
