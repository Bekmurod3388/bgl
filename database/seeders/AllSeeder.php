<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AllSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('firms')->insert([
            'id'=>1,
           'name' =>'Firma 1',
            'all_sum'=>1000000,
             'indebtedness'=>100000,
             'given_sum'=>900000

        ]);
        DB::table('workers')->insert([
              'id'=>1,
            'name' =>'Ishchi 1',
            'all_sum'=>1000000,
            'indebtedness'=>100000,
            'given_sum'=>900000

        ]);
        DB::table('firm_incomes')->insert([
               'id'=>1,
                'firm_id'=>1,
                'car_number'=>'AA 1234 AA',
                'date'=>'2021-09-26',
                'brutto'=>100000,
                'netto'=>90000,
                'tara'=>10000,
                'soil'=>1000,
                'weight'=>100,
                'price'=>1000,
                'total_price'=>100000,


        ]);
           DB::table('works')->insert([
               'id'=>1,
                'name'=>'Ish 1',
                'type'=>1,
                'price'=>1000
        ]);
           DB::table('worker_gaves')->insert([
                'id'=>1,
                 'worker_id'=>1,
                 'price'=>100000,
                 'date'=>'2021-09-26'

        ]);
           DB::table('firm_provideds')->insert([
                'id'=>1,
                 'firm_id'=>1,
                 'price'=>100000,
                 'date'=>'2021-09-26'
               ]);
           DB::table('jobs')->insert([
                'id'=>1,
                 'worker_id'=>1,
                 'type_work_id'=>1,
                 'date'=>'2021-09-26',
                 'type'=>1,
                 'all_sum'=>100000
               ]);
           DB::table('product')->insert([
                'id'=>1,
                 'name'=>'Mahsulot 1',
                 'minimum_price'=>1000,
                 'maximum_price'=>10000
               ]);
           DB::table('sells')->insert([
                'id'=>1,
                'whom'=>'Sotuvchi 1',
                'given_sum'=>100000,
                'all_sum'=>1000000,
                'indebtedness'=>900000
               ]);
           DB::table('outlay')->insert([
               'id'=>1,
               'date'=>'2021-09-26',
               'outlay_name'=>'Xarajat 1',
               'summ'=>100000,
               'one_summ'=>100000,
               'all_summ'=>1000000,

           ]);
           DB::table('sell_incomes')->insert([
               'id'=>1,
               'sell_id'=>1,
               'car_number'=>'AA 1234 AA',
               'product_id'=>1,
               'kg'=>100,
               'how_sum'=>1000,
               'total_sum'=>100000
           ]);
           DB::table('sell_provideds')->insert([
               'id'=>1,
               'sell_id'=>1,
              'given_sum'=>100000,
                'date'=>'2021-09-26'
           ]);



    }
}
