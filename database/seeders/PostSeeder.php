<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class PostSeeder extends Seeder

{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      $faker =Faker::create();
      for($i=0;$i<50;$i++){
        DB::table('posts')->insert([
           
            'title' => $faker->sentence(),
            'body' =>$faker->paragraph(),
        ]);}
    }
    
}
