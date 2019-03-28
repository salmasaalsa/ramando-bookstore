<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
class merek extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        foreach(range(1,10) as $index){
            DB::table('merek')->insert([
                'nama_merek' =>$faker->title,
                
            ]);
        }
    }
    }

