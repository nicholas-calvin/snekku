<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $password = Hash::make('admin');
        DB::table('users')->insert([
            'firstName' => 'Admin',
            'lastname' => 'Admin', 
            'phoneNumber' => '0000000000',
            'email' => 'admin@admin.com',
            'password' => $password,
            'role_id' => '1'
        ]);
        // \App\Models\User::factory(10)->create();
        // $users = [];
        // $faker = Faker\Factory::create();

        // for($i = 0;$i < 15;$i++){
        //     $data[$i] = [

        //     ];
        // }
    }
}
