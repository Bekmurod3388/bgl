<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WorkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('works')->insert([
            'id'=>1,
            'name' =>'Polochka yirik',
            'type' =>'1',
            'price' => 300,
        ]);

        DB::table('works')->insert([
            'id'=>2,
            'name' =>'Polochka mayda',
            'type' =>'1',
            'price' => 300,
        ]);

        DB::table('works')->insert([
            'id'=>3,
            'name' =>'Yuvish',
            'type' =>'2',
            'price' => 1800,
        ]);
        DB::table('works')->insert([
            'id'=>4,
            'name' =>'Pishirish',
            'type' =>'2',
            'price' => 1800,
        ]);
        DB::table('works')->insert([
            'id'=>5,
            'name' =>'Kesish',
            'type' =>'1',
            'price' => 300,
        ]);
        DB::table('works')->insert([
            'id'=>6,
            'name' =>'Kesish',
            'type' =>'3',
            'price' => 7000,
        ]);
        DB::table('works')->insert([
            'id'=>7,
            'name' =>'Kesish',
            'type' =>'3',
            'price' => 7000,
        ]);
        DB::table('works')->insert([
            'id'=>8,
            'name' =>'Elash',
            'type' =>'3',
            'price' => 7000,
        ]);
        DB::table('works')->insert([
            'id'=>9,
            'name' =>'Saralash',
            'type' =>'1',
            'price' => 1000,
        ]);
        DB::table('works')->insert([
            'id'=>10,
            'name' =>'Qoplash',
            'type' =>'3',
            'price' => 7000,
        ]);

    }
}
