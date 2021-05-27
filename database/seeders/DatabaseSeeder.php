<?php

namespace Database\Seeders;

use App\Models\Author;
use App\Models\Books;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         Author::factory(50)->create();
         Books::factory(100)->create();
        $this->call(UserTableSeeder::class);
        $this->call(ShelveTableSeeder::class);
        $this->call(ShelveBookSeeder::class);
    }
}
