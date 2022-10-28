<?php

namespace App\Http\Controllers;

use App\Models\Firm;
use App\Models\Outlay;
use App\Models\Sell;
use App\Models\Warehouse;
use App\Models\Worker;
use Illuminate\Http\Request;
use Carbon\Carbon;

class StatisticController extends Controller
{
    public function index()
    {

//        Chiqimlar
        $outs = Outlay::all();
        foreach ($outs as $fir) {
            $names[] = $fir['outlay_name'];
            $value[] = $fir['all_summ'];
        }

        $outs_yesterday = Outlay::whereDate('from_date', Carbon::yesterday()->toDateString())->get();
        $outs_today = Outlay::whereDate('from_date', Carbon::today()->toDateString())->get();

        $outs_allsum[] = $outs_yesterday->sum('all_summ');
        $outs_allsum[] = $outs_today->sum('all_summ');


        $outs_name[] = 'Kecha';
        $outs_name[] = 'Bugun';


//        Kirimlar
        $sells = Sell::all();
        foreach ($sells as $fir) {
            $sell_names[] = $fir['whom'];
            $sell_value[] = $fir['all_sum'];
        }

        $sells_yesterday = Sell::whereDate('created_at', Carbon::yesterday()->toDateString())->get();
        $sells_today = Sell::whereDate('created_at', Carbon::today()->toDateString())->get();

        $sells_allsum[] = $sells_yesterday->sum('all_sum');
        $sells_allsum[] = $sells_today->sum('all_sum');

//        workers
        $workers = Worker::all();
        foreach ($workers as $fir) {
            $worker_names[] = $fir['name'];
            $worker_summ[] = $fir['all_sum'];
        }

        $workers_yesterday = Worker::whereDate('created_at', Carbon::yesterday()->toDateString())->get();
        $workers_today = Worker::whereDate('created_at', Carbon::today()->toDateString())->get();

        $workers_allsum[] = $workers_yesterday->sum('all_sum');
        $workers_allsum[] = $workers_today->sum('all_sum');
        $today_workers = $workers_today->count();

        $today_product = Warehouse::whereDate('created_at', Carbon::today()->toDateString())->get();
        $today_product = $today_product->sum('weight');





        return view('adminpanel.statistic', [
            'firms' => $outs,
            'names' => $names ?? 0,
            'all_sum' => $value ?? 0,
            'outs_allsum' => $outs_allsum ?? 0,
            'outs_name' => $outs_name ?? 0,


            'sells' => $sells,
            'sell_names' => $sell_names ?? 0,
            'sell_value' => $sell_value ?? 0,
            'sells_allsum' => $sells_allsum ?? 0,

            'workers' => $workers,
            'worker_names' => $worker_names ?? 0,
            'worker_summ' => $worker_summ ?? 0,
            'worker_allsum' => $workers_allsum ?? 0,
            'today_workers' => $today_workers ?? 0,
            'today_product' => $today_product ?? 0,

        ]);


    }
}
