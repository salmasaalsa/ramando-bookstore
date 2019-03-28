<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
class bukutamu extends Seeder
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
            DB::table('bukutamu')->insert([
                'nama' =>$faker->name,
                'email' =>$faker->email,
                'alamat' =>$faker->address,
                'jeniskelamin' =>'N/A'
            ]);
        }
    }
}
