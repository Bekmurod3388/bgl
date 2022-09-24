<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TurSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('turs')->insert([
            'id'=>1,
            'name' =>'kg'
        ]);
        DB::table('turs')->insert([
            'id'=>2,
            'name' =>'dona'
        ]);
        DB::table('turs')->insert([
            'id'=>3,
            'name' =>'soat'
        ]);
    }
}
