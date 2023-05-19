<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('services')->insert([
            'name'=>'Ferfi fodraszat'
        ]);
        DB::table('services')->insert([
            'name'=>'Noi fodraszat'
        ]);
        DB::table('services')->insert([
            'name'=>'masszazs'
        ]);
    }
}
