<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
class SalonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('salons')->insert([
            'user_id'=>1,
            'name'=> "Juan Barbershop",
            'description'=> "Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempore adipisci,
            tenetur magni unde numquam, minus perspiciatis voluptatibus earum illo, aliquam consequatur quis cumque
            tempora quisquam soluta repudiandae veritatis accusantium exercitationem.",
            'phone_number'=> "0722222222",
            'email'=>'example@example.com',
        ]);
        DB::table('salons')->insert([
            'user_id'=>2,
            'name'=> "Monicas Massage Salon",
            'description'=> "Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempore adipisci,
            tenetur magni unde numquam, minus perspiciatis voluptatibus earum illo, aliquam consequatur quis cumque
            tempora quisquam soluta repudiandae veritatis accusantium exercitationem.",
            'phone_number'=> "0722222222",
            'email'=>'example@example.com',
        ]);
        DB::table('salons')->insert([
            'user_id'=>3,
            'name'=> "Fauns Barbershop",
            'description'=> "Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempore adipisci,
            tenetur magni unde numquam, minus perspiciatis voluptatibus earum illo, aliquam consequatur quis cumque
            tempora quisquam soluta repudiandae veritatis accusantium exercitationem.",
            'phone_number'=> "0722222222",
            'email'=>'example@example.com',
        ]);



    }
}
