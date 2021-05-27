<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ShelveBookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
/*        $data1 = array();
        $data1['shelve_id'] = rand(1, 3);
        $data1['row'] = rand(1, 5);
        $data1['book_id'] = rand(1, 100);
        DB::table('shelve_books')->insert($data1);

        $data2 = array();
        $data2['shelve_id'] = rand(1, 3);
        $data2['row'] = rand(1, 5);
        $data2['book_id'] = rand(1, 100);
        DB::table('shelve_books')->insert($data2);

        $data3 = array();
        $data3['shelve_id'] = rand(1, 3);
        $data3['row'] = rand(1, 5);
        $data3['book_id'] = rand(1, 100);
        DB::table('shelve_books')->insert($data3);

        $data4 = array();
        $data4['shelve_id'] = rand(1, 3);
        $data4['row'] = rand(1, 5);
        $data4['book_id'] = rand(1, 100);
        DB::table('shelve_books')->insert($data4);

        $data5 = array();
        $data5['shelve_id'] = rand(1, 3);
        $data5['row'] = rand(1, 5);
        $data5['book_id'] = rand(1, 100);
        DB::table('shelve_books')->insert($data5);

        $data6 = array();
        $data6['shelve_id'] = rand(1, 3);
        $data6['row'] = rand(1, 5);
        $data6['book_id'] = rand(1, 100);
        DB::table('shelve_books')->insert($data6);

        $data7 = array();
        $data7['shelve_id'] = rand(1, 3);
        $data7['row'] = rand(1, 5);
        $data7['book_id'] = rand(1, 100);
        DB::table('shelve_books')->insert($data7);

        $data8 = array();
        $data8['shelve_id'] = rand(1, 3);
        $data8['row'] = rand(1, 5);
        $data8['book_id'] = rand(1, 100);
        DB::table('shelve_books')->insert($data8);*/

        for ($i=0 ;$i<100 ; $i++)
        {
            $data = array();
            $data['shelve_id'] = rand(1, 3);
            $data['row'] = rand(1, 5);
            $data['book_id'] = rand(1, 100);
            DB::table('shelve_books')->insert($data);
        }


    }
}
