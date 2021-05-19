<?php

namespace Database\Seeders;

use App\Models\Models\Province;
use Illuminate\Database\Seeder;

class ProvinceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Province::insert([
           [
               'id' => 1,
               'name' => 'Phnom Penh'
           ],
            [
                'id' => 2,
                'name' => 'Siem Reap'
            ]
        ]);
    }
}
