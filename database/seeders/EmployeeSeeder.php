<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('employees')->insert([
            'salon_id'=> 1,
            'name'=> "Nagy Janos",
            'description'=> "valami szoveg bla bla",
            'starts_at' => "12:00:00",
            'ends_at' => "16:00:00"

        ]);
        DB::table('employees')->insert([
            'salon_id'=> 2,
            'name'=> "Kiss Kassai",
            'description'=> "valami szoveg bla bla",
            'starts_at' => "09:00:00",
            'ends_at' => "17:00:00"

        ]);
        DB::table('employees')->insert([
            'salon_id'=> 1,
            'name'=> "Szabo Petya",
            'description'=> "valami szoveg bla bla",
            'starts_at' => "09:00:00",
            'ends_at' => "15:00:00"

        ]);
    }
}
