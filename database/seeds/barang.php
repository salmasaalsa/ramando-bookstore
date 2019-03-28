<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
class barang extends Seeder
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
            DB::table('barang')->insert([
                'nama_barang' =>$faker->title,
                'stok' =>$faker->randomFloat(5),
                'harga' =>$faker->randomNumber(6),
                'deskripsi' =>$faker->text,
                'id_merek'=>$faker->randomDigit,
            ]);
        }
    }
    }

