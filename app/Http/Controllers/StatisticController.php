<?php

namespace App\Http\Controllers;

use App\Http\Service\Chart;
use App\Models\Electric_Current;
use App\Models\Finished_Product;
use App\Models\Firm;
use App\Models\Gaz;
use App\Models\Jobs;
use App\Models\FirmIncome;

use App\Models\Outlay;
use App\Models\Sell;
use App\Models\Warehouse;
use App\Models\Worker;
use Illuminate\Http\Request;
use Carbon\Carbon;

class StatisticController extends Controller
{
    public $chart;

    public function __construct()
    {
        $this->chart = new Chart;
    }

    public function index()
    {
        $from_date = date('Y-m-d', Strtotime(now()));
        $to_date = date('Y-m-d', Strtotime(now()));
//        $from_date="2022-11-01";
//        $to_date="2022-11-20";
        $firm_values = $this->chart->index('firm_incomes', 'firms','name','id','date', 'firm_id', 'total_price', $from_date, $to_date);
        $worker_values = $this->chart->index('jobs','workers','name','id','date','worker_id', 'all_sum', $from_date, $to_date);
        $sell_values = $this->chart->index('sell_incomes', 'sells','whom','id','created_at','sell_id', 'total_sum', $from_date, $to_date);
         $outlay_values = $this->chart->index('outlay','outlay','outlay_name', 'outlay_name','from_date','outlay_name','all_summ', $from_date, $to_date);
//                dd($firm_values);
        $ildiz = FirmIncome::whereBetween('date', [$from_date, $to_date])->get()->sum('weight');
        $mahsulot = Finished_Product::whereBetween('date', [$from_date, $to_date])->get()->sum('weight');
        $moyka = Jobs::where('type_work_id', 3)->whereBetween('date', [$from_date, $to_date])->get()->sum('type');
        $kesilgan_slays_kg = Jobs::where('type_work_id', 7)->whereBetween('date', [$from_date, $to_date])->get()->sum('type');
        $kesilgan_slays_soat = Jobs::where('type_work_id', 8)->whereBetween('date', [$from_date, $to_date])->get()->sum('type');
        $kesilgan_tabletka_kg = Jobs::where('type_work_id', 5)->whereBetween('date', [$from_date, $to_date])->get()->sum('type');
        $kesilgan_tabletka_soat = Jobs::where('type_work_id', 6)->whereBetween('date', [$from_date, $to_date])->get()->sum('type');
        $yirik_palochka = Jobs::where('type_work_id', 1)->whereBetween('date', [$from_date, $to_date])->get()->sum('type');
        $mayda_palochka = Jobs::where('type_work_id', 2)->whereBetween('date', [$from_date, $to_date])->get()->sum('type');
        $ishchilar_ish_haqqi = Jobs::whereBetween('date', [$from_date, $to_date])->get()->sum('all_sum');
        $komunal1 = Gaz::whereBetween('date', [$from_date, $to_date])->get()->sum('money_paid');
        $komunal2 = Electric_Current::whereBetween('date', [$from_date, $to_date])->get()->sum('money_paid');
        $komunal = $komunal1 + $komunal2;
        $chiqim = Outlay::whereBetween('from_date', [$from_date, $to_date])->get()->sum('all_summ');

        return view('adminpanel.statistic', [
            'ildiz' => $ildiz,
            'mahsulot' => $mahsulot,
            'moyka' => $moyka,
            'kesilgan_slays_kg' => $kesilgan_slays_kg,
            'kesilgan_slays_soat' => $kesilgan_slays_soat,
            'kesilgan_tabletka_kg' => $kesilgan_tabletka_kg,
            'kesilgan_tabletka_soat' => $kesilgan_tabletka_soat,
            'ishchilar_ish_haqqi' => $ishchilar_ish_haqqi,
            'yirik_palochka' => $yirik_palochka,
            'mayda_palochka' => $mayda_palochka,
            'komunal' => $komunal,
            'chiqim' => $chiqim,
            'from_date' => $from_date,
            'to_date' => $to_date,
            'firm_values' => $firm_values,
            'worker_values' => $worker_values,
            'sell_values' => $sell_values,
            'outlay_values' => $outlay_values,
        ]);

    }

    public function search(Request $request)
    {
        $from_date = date('Y-m-d', Strtotime($request['from_date']));
        $to_date = date('Y-m-d', Strtotime($request['to_date']));
        $firm_values = $this->chart->index('firm_incomes', 'firms','name','id','date', 'firm_id', 'total_price', $from_date, $to_date);
        $worker_values = $this->chart->index('jobs','workers','name','id','date','worker_id', 'all_sum', $from_date, $to_date);
        $sell_values = $this->chart->index('sell_incomes', 'sells','whom','id','created_at','sell_id', 'total_sum', $from_date, $to_date);
        $outlay_values = $this->chart->index('outlay','outlay','outlay_name', 'outlay_name','from_date','outlay_name','all_summ', $from_date, $to_date);
        $ildiz = FirmIncome::whereBetween('date', [$from_date, $to_date])->get()->sum('weight');
        $mahsulot = Finished_Product::whereBetween('date', [$from_date, $to_date])->get()->sum('weight');
        $moyka = Jobs::where('type_work_id', 3)->whereBetween('date', [$from_date, $to_date])->get()->sum('type');
        $kesilgan_slays_kg = Jobs::where('type_work_id', 7)->whereBetween('date', [$from_date, $to_date])->get()->sum('type');
        $kesilgan_slays_soat = Jobs::where('type_work_id', 8)->whereBetween('date', [$from_date, $to_date])->get()->sum('type');
        $kesilgan_tabletka_kg = Jobs::where('type_work_id', 5)->whereBetween('date', [$from_date, $to_date])->get()->sum('type');
        $kesilgan_tabletka_soat = Jobs::where('type_work_id', 6)->whereBetween('date', [$from_date, $to_date])->get()->sum('type');
        $yirik_palochka = Jobs::where('type_work_id', 1)->whereBetween('date', [$from_date, $to_date])->get()->sum('type');
        $mayda_palochka = Jobs::where('type_work_id', 2)->whereBetween('date', [$from_date, $to_date])->get()->sum('type');
        $ishchilar_ish_haqqi = Jobs::whereBetween('date', [$from_date, $to_date])->get()->sum('all_sum');
        $komunal1 = Gaz::whereBetween('date', [$from_date, $to_date])->get()->sum('money_paid');
        $komunal2 = Electric_Current::whereBetween('date', [$from_date, $to_date])->get()->sum('money_paid');
        $komunal = $komunal1 + $komunal2;
        $chiqim = Outlay::whereBetween('from_date', [$from_date, $to_date])->get()->sum('all_summ');

        return view('adminpanel.statistic', [
            'ildiz' => $ildiz,
            'mahsulot' => $mahsulot,
            'moyka' => $moyka,
            'kesilgan_slays_kg' => $kesilgan_slays_kg,
            'kesilgan_slays_soat' => $kesilgan_slays_soat,
            'kesilgan_tabletka_kg' => $kesilgan_tabletka_kg,
            'kesilgan_tabletka_soat' => $kesilgan_tabletka_soat,
            'ishchilar_ish_haqqi' => $ishchilar_ish_haqqi,
            'yirik_palochka' => $yirik_palochka,
            'mayda_palochka' => $mayda_palochka,
            'komunal' => $komunal,
            'chiqim' => $chiqim,
            'from_date' => $from_date,
            'to_date' => $to_date,
            'firm_values' => $firm_values,
            'worker_values' => $worker_values,
            'sell_values' => $sell_values,
            'outlay_values' => $outlay_values,
        ]);

    }

    public function all()
    {
//        $from_date = date('Y-m-d', Strtotime(now()));
//        $to_date = date('Y-m-d', Strtotime(now()));
        $firm_values = $this->chart->index('firm_incomes', 'firms','name','id','date', 'firm_id', 'total_price');
        $worker_values = $this->chart->index('jobs','workers','name','id','date','worker_id', 'all_sum');
        $sell_values = $this->chart->index('sell_incomes', 'sells','whom','id','created_at','sell_id', 'total_sum');
        $outlay_values = $this->chart->index('outlay','outlay','outlay_name', 'outlay_name','from_date','outlay_name','all_summ');
        $ildiz = FirmIncome::all()->sum('weight');
        $mahsulot = Finished_Product::all()->sum('weight');
        $moyka = Jobs::where('type_work_id', 3)->get()->sum('type');
        $kesilgan_slays_kg = Jobs::where('type_work_id', 7)->get()->sum('type');
        $kesilgan_slays_soat = Jobs::where('type_work_id', 8)->get()->sum('type');
        $kesilgan_tabletka_kg = Jobs::where('type_work_id', 5)->get()->sum('type');
        $kesilgan_tabletka_soat = Jobs::where('type_work_id', 6)->get()->sum('type');
        $yirik_palochka = Jobs::where('type_work_id', 1)->get()->sum('type');
        $mayda_palochka = Jobs::where('type_work_id', 2)->get()->sum('type');
        $ishchilar_ish_haqqi = Jobs::all()->sum('all_sum');
        $komunal1 = Gaz::all()->sum('money_paid');
        $komunal2 = Electric_Current::all()->sum('money_paid');
        $komunal = $komunal1 + $komunal2;
        $chiqim = Outlay::all()->sum('all_summ');

        return view('adminpanel.statistic', [
            'ildiz' => $ildiz,
            'mahsulot' => $mahsulot,
            'moyka' => $moyka,
            'kesilgan_slays_kg' => $kesilgan_slays_kg,
            'kesilgan_slays_soat' => $kesilgan_slays_soat,
            'kesilgan_tabletka_kg' => $kesilgan_tabletka_kg,
            'kesilgan_tabletka_soat' => $kesilgan_tabletka_soat,
            'ishchilar_ish_haqqi' => $ishchilar_ish_haqqi,
            'yirik_palochka' => $yirik_palochka,
            'mayda_palochka' => $mayda_palochka,
            'komunal' => $komunal,
            'chiqim' => $chiqim,
            'firm_values' => $firm_values,
            'worker_values' => $worker_values,
            'sell_values' => $sell_values,
            'outlay_values' => $outlay_values,
//            'from_date'=>$from_date,
//            'to_date'=>$to_date,
        ]);

    }
}
