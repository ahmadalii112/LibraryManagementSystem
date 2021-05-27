<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ShelveTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data1 = array();
        $data1['shelves_name'] = 'Shelve A';
        DB::table('shelves')->insert($data1);

        $data2 = array();
        $data2['shelves_name'] = 'Shelve B';
        DB::table('shelves')->insert($data2);

        $data3 = array();
        $data3['shelves_name'] = 'Shelve C';
        DB::table('shelves')->insert($data3);
    }
}
