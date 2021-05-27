<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        {
            $user = User::where('email','admin@admin.com')->first();
            if(!$user){
                User::create([
                    'name'=>'Ahmad Ali',
                    'email'=>'admin@admin.com',
                    'role'=>'admin',
                    'phone'=>'12345',
                    'address'=>'lahore',
                    'password'=>Hash::make('password')
                ]);
            }
        }
    }
}
