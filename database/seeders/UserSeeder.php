<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
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
            'name'=> 'Jonas',
            'email'=> 'valami@email.com',
            'password'=> Hash::make("norberto82"),

        ]);
        DB::table('users')->insert([
            'name'=> 'Jonas2',
            'email'=> 'valaki@email.com',
            'password'=> Hash::make("norberto82"),
        ]);
        DB::table('users')->insert([
            'name'=> 'Jonas1',
            'email'=> 'norbert@email.com',
            'password'=> Hash::make("norberto82"),
        ]);
        DB::table('users')->insert([
            'name'=> 'Lajos',
            'email'=> 'norberto@email.com',
            'password'=> Hash::make("norberto83"),
        ]);
        DB::table('users')->insert([
            'name'=> 'admin',
            'email'=> 'admin@admin.com',
            'password'=> Hash::make("admin"),
            'is_admin'=>'1',

        ]);

    }
}
