<?php

namespace App\Http\Controllers;

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
//    public function index()
//    {
//
//// Jobs
//        $jobs_today = Jobs::whereDate('date', Carbon::today()->toDateString())->get();
//        $jobs_moon = Jobs::whereMonth('date', date('m'))->get();
//
//        $moyka = Jobs::where('type_work_id',3)->whereDate('date', Carbon::today()->toDateString())->get();
//        $yirik = Jobs::where('type_work_id',1)->whereDate('date', Carbon::today()->toDateString())->get();
//        $mayda = Jobs::where('type_work_id',2)->whereDate('date', Carbon::today()->toDateString())->get();
//
//        $tabletka_kg = Jobs::where('type_work_id',5)->whereDate('date', Carbon::today()->toDateString())->get();
//        $tabletka_soat = Jobs::where('type_work_id',6)->whereDate('date', Carbon::today()->toDateString())->get();
//        $all_tabletka_kg = Jobs::where('type_work_id',5)->get();
//        $all_tabletka_soat = Jobs::where('type_work_id',6)->get();
//
//
//        $slays_kg = Jobs::where('type_work_id',7)->whereDate('date', Carbon::today()->toDateString())->get();
//        $slays_soat = Jobs::where('type_work_id',8)->whereDate('date', Carbon::today()->toDateString())->get();
//        $all_slays_kg = Jobs::where('type_work_id',7)->get();
//        $all_slays_soat = Jobs::where('type_work_id',8)->get();
//
//        $moykalar=0;
//        $yiriklar=0;
//        $maydalar=0;
//        $sla_kg = 0;
//        $sla_h = 0;
//        $all_sla_kg = 0;
//        $all_sla_h = 0;
//
//        $tab_kg = 0;
//        $tab_h = 0;
//        $all_tab_kg = 0;
//        $all_tab_h = 0;
//
//        foreach ($moyka as $m){
//            $moykalar+=$m['type'];
//        }
//        foreach ($yirik as $m){
//            $yiriklar+=$m['type'];
//        }
//        foreach ($mayda as $m){
//            $maydalar+=$m['type'];
//        }
//
//
//        foreach ($tabletka_kg as $m){
//            $tab_kg+=$m['type'];
//        }
//        foreach ($tabletka_soat as $m){
//            $tab_h+=$m['type'];
//        }
//        foreach ( $all_tabletka_kg as $m){
//            $all_tab_kg+=$m['type'];
//        }
//        foreach ($all_tabletka_soat as $m){
//            $all_tab_h+=$m['type'];
//        }
//
//
//        foreach ($slays_soat as $m){
//            $sla_h+=$m['type'];
//        }
//        foreach ($slays_kg as $m){
//            $sla_kg+=$m['type'];
//        }
//        foreach ($all_slays_kg as $m){
//            $all_sla_kg+=$m['type'];
//        }
//        foreach ($all_slays_soat as $m){
//            $all_sla_h+=$m['type'];
//        }
//
//
//
//        $workers_today_allsum = $jobs_today->sum('all_sum');
//        $workers_moon_allsum = $jobs_moon->sum('all_sum');
//
//        $workers_name[] = 'Kecha';
//        $workers_name[] = 'Bugun';
//
//// Kamunal
//        $communal_today = Gaz::whereDate('date', Carbon::today()->toDateString())->get();
//        $communal_moon = Gaz::whereMonth('date', date('m'))->get();
//        $communal_today1 = Electric_Current::whereDate('date', Carbon::today()->toDateString())->get();
//        $communal_moon1 = Electric_Current::whereMonth('date', date('m'))->get();
//
//
//        $communal_today_allsum = $communal_today->sum('all_sum') + $communal_today1->sum('all_sum');
//        $communal_moon_allsum = $communal_moon->sum('all_sum') + $communal_moon1->sum('all_sum');
//
//
//// Finished Products
//
//        $finished_moon = Finished_Product::whereMonth('date', date('m'))->get();
//        $finished_today = Finished_Product::whereDate('date', Carbon::today()->toDateString())->get();
//
//        $finished_moon_allsum = $finished_moon->sum('weight');
//        $finished_today_allsum = $finished_today->sum('weight');
//
//
//// Chiqimlar
//        $outs = Outlay::all();
//        foreach ($outs as $fir) {
//            $names[] = $fir['outlay_name'];
//            $value[] = $fir['all_summ'];
//        }
//
//        $outs_yesterday = Outlay::whereDate('from_date', Carbon::yesterday()->toDateString())->get();
//        $outs_today = Outlay::whereDate('from_date', Carbon::today()->toDateString())->get();
//        $outs = Outlay::all();
//
//        $outs_allsum[] = $outs_yesterday->sum('all_summ');
//        $outs_allsum[] = $outs_today->sum('all_summ');
//
//        $outs_allsum_today = $outs_today->sum('all_summ');
//        $outs_all = $outs->sum('all_summ');
//
//        $outs_name[] = 'Kecha';
//        $outs_name[] = 'Bugun';
//
//
//// Kirimlar
//        $sells = Sell::all();
//        foreach ($sells as $fir) {
//            $sell_names[] = $fir['whom'];
//            $sell_value[] = $fir['all_sum'];
//        }
//
//        $sells_yesterday = Sell::whereDate('created_at', Carbon::yesterday()->toDateString())->get();
//        $sells_today = Sell::whereDate('created_at', Carbon::today()->toDateString())->get();
//
//        $sells_allsum[] = $sells_yesterday->sum('all_sum');
//        $sells_allsum[] = $sells_today->sum('all_sum');
//
//
//// workers
//        $workers = Worker::all();
//        foreach ($workers as $fir) {
//            $worker_names[] = $fir['name'];
//            $worker_summ[] = $fir['all_sum'];
//        }
//
//        $workers_yesterday = Worker::whereDate('created_at', Carbon::yesterday()->toDateString())->get();
//        $workers_today = Worker::whereDate('created_at', Carbon::today()->toDateString())->get();
//
//        $workers_allsum[] = $workers_yesterday->sum('all_sum');
//        $workers_allsum[] = $workers_today->sum('all_sum');
//
/////maxsulot
//        $today_product = Warehouse::whereDate('created_at', Carbon::today()->toDateString())->get();
//        $today_product = $today_product->sum('weight');
//
///////kommunal
//
//        $gas = Gaz::whereDate('date', Carbon::yesterday()->toDateString())->get();
//        $gazs = $gas->sum('money_paid');
//        $svet = Electric_Current::whereDate('date', Carbon::yesterday()->toDateString())->get();
//        $svets = $svet->sum('money_paid');
//
//////kommunol 1 oy
//        $gas1 = Gaz::whereMonth('date', Carbon::now()->month)->get();
//        $gazs1 = $gas1->sum('money_paid');
//        $svet1 = Electric_Current::whereMonth('date', Carbon::now()->month)->get();
//        $svets1 = $svet1->sum('money_paid');
//
//
//
/////sof ildiz
//        $firms = FirmIncome::whereDate('date', Carbon::today()->toDateString())->get();
//        $sum_firms[] = $firms->sum('weight');
//        $from_date = Carbon::today();
//        $old_date = date('Y-m-d', strtotime('-1 month', strtotime(now())));
//
//        $firms1 = FirmIncome::whereBetween('date', [$old_date, $from_date])->get();
//        $firms_allsum = $firms1->sum('weight');
//
//
//
///////// tayyor mahsulot
//        $tayyor = Finished_Product::whereDate('date', Carbon::today()->toDateString())->get();
//        $tayyor_summ = $tayyor->sum('weight');
//
//        $tayyor_month = Finished_Product::whereBetween('date', [$old_date, $from_date])->get();
//        $tayyor_month_summ = $tayyor_month->sum('weight');
//
/////ishchilar haqi
//        $workers = Worker::whereDate('created_at', Carbon::today()->toDateString())->get();
//        $workers_summ = $workers->sum('given_sum');
//
//        return view('adminpanel.statistic', [
//
// /////chiqim
//            'sum_firms' => $sum_firms ?? 0,
//            'firms_allsum' => $firms_allsum ?? 0,
//
// //// tayyor mahsulot
//            'tayyor_today' => $tayyor_summ,
//            'tayyor_month_summ' => $tayyor_month_summ,
/////kommunal
//            'gazs' => $gazs,
//            'svets' => $svets,
//            'gazs1' => $gazs1,
//            'svets1' => $svets1,
/////ish haqi
//            'workers_summ' => $workers_summ,
//
//            'firms' => $outs,
//            'names' => $names ?? 0,
//            'all_sum' => $value ?? 0,
//            'outs_allsum' => $outs_allsum ?? 0,
//            'outs_name' => $outs_name ?? 0,
//            'outs_allsum_today'=>$outs_allsum_today ?? 0,
//            'outs_all' => $outs_all ?? 0,
//
//
//
//            'sells' => $sells,
//            'sell_names' => $sell_names ?? 0,
//            'sell_value' => $sell_value ?? 0,
//            'sells_allsum' => $sells_allsum ?? 0,
//
//            'workers' => $workers,
//            'worker_names' => $worker_names ?? 0,
//            'worker_summ' => $worker_summ ?? 0,
//            'worker_allsum' => $workers_allsum ?? 0,
//            'today_workers' => $today_workers ?? 0,
//
//            'workers_moon_allsum'=>$workers_moon_allsum ?? 0,
//            'workers_today_allsum'=>$workers_today_allsum ?? 0,
//
//            'finished_today_allsum'=>$finished_today_allsum ?? 0,
//            'finished_moon_allsum'=>$finished_moon_allsum ?? 0,
//
//            'communal_today_allsum'=>$gazs+$svets ?? 0,
//            'communal_moon_allsum'=>$gazs1+$svets1 ?? 0,
//
//
//            'today_product' => $today_product ?? 0,
//            'moykalar'=>$moykalar ?? 0,
//            'yirik'=>$yiriklar ?? 0,
//            'mayda'=>$maydalar ?? 0,
//
//
//            'sla_kg'=>$sla_kg ?? 0,
//            'sla_h'=>$sla_h ?? 0,
//            'all_sla_kg'=>$all_sla_kg ?? 0,
//            'all_sla_h'=>$all_sla_h ?? 0,
//
//
//            'tab_kg'=>$tab_kg ?? 0,
//            'tab_h'=>$tab_h ?? 0,
//            'all_tab_kg'=>$all_tab_kg ?? 0,
//            'all_tab_h'=>$all_tab_h ?? 0,
//
//
//
//
//
//
//        ]);
//
//
//    }
public function  index(){
    $from_date = date('Y-m-d', Strtotime(now()));
    $to_date = date('Y-m-d', Strtotime(now()));
    $ildiz = FirmIncome::whereBetween('date', [$from_date, $to_date])->get()->sum('weight');
    $mahsulot = Finished_Product::whereBetween('date',[$from_date,$to_date])->get()->sum('weight');
    $moyka = Jobs::where('type_work_id',3)->whereBetween('date',[$from_date,$to_date])->get()->sum('type');
    $kesilgan_slays_kg = Jobs::where('type_work_id',7)->whereBetween('date',[$from_date,$to_date])->get()->sum('type');
    $kesilgan_slays_soat = Jobs::where('type_work_id',8)->whereBetween('date',[$from_date,$to_date])->get()->sum('type');
    $kesilgan_tabletka_kg = Jobs::where('type_work_id',5)->whereBetween('date',[$from_date,$to_date])->get()->sum('type');
    $kesilgan_tabletka_soat = Jobs::where('type_work_id',6)->whereBetween('date',[$from_date,$to_date])->get()->sum('type');
    $yirik_palochka = Jobs::where('type_work_id',1)->whereBetween('date',[$from_date,$to_date])->get()->sum('type');
    $mayda_palochka = Jobs::where('type_work_id',2)->whereBetween('date',[$from_date,$to_date])->get()->sum('type');
    $ishchilar_ish_haqqi = Jobs::whereBetween('date',[$from_date,$to_date])->get()->sum('all_sum');
    $komunal1 = Gaz::whereBetween('date',[$from_date,$to_date])->get()->sum('money_paid');
    $komunal2 = Electric_Current::whereBetween('date',[$from_date,$to_date])->get()->sum('money_paid');
    $komunal=$komunal1+$komunal2;
    $chiqim = Outlay::whereBetween('from_date',[$from_date,$to_date])->get()->sum('all_summ');

    return view('adminpanel.statistic',[
        'ildiz'=>$ildiz,
        'mahsulot'=>$mahsulot,
        'moyka'=>$moyka,
        'kesilgan_slays_kg'=>$kesilgan_slays_kg,
        'kesilgan_slays_soat'=>$kesilgan_slays_soat,
        'kesilgan_tabletka_kg'=>$kesilgan_tabletka_kg,
        'kesilgan_tabletka_soat'=>$kesilgan_tabletka_soat,
        'ishchilar_ish_haqqi'=>$ishchilar_ish_haqqi,
        'yirik_palochka'=>$yirik_palochka,
        'mayda_palochka'=>$mayda_palochka,
        'komunal'=>$komunal,
        'chiqim'=>$chiqim,
        ]);

}
    public function search(Request $request)
    {
        $from_date = date('Y-m-d', Strtotime($request['from_date']));
        $to_date = date('Y-m-d', Strtotime($request['to_date']));
        $ildiz = FirmIncome::whereBetween('date', [$from_date, $to_date])->get()->sum('weight');
        $mahsulot = Finished_Product::whereBetween('date',[$from_date,$to_date])->get()->sum('weight');
        $moyka = Jobs::where('type_work_id',3)->whereBetween('date',[$from_date,$to_date])->get()->sum('type');
        $kesilgan_slays_kg = Jobs::where('type_work_id',7)->whereBetween('date',[$from_date,$to_date])->get()->sum('type');
        $kesilgan_slays_soat = Jobs::where('type_work_id',8)->whereBetween('date',[$from_date,$to_date])->get()->sum('type');
        $kesilgan_tabletka_kg = Jobs::where('type_work_id',5)->whereBetween('date',[$from_date,$to_date])->get()->sum('type');
        $kesilgan_tabletka_soat = Jobs::where('type_work_id',6)->whereBetween('date',[$from_date,$to_date])->get()->sum('type');
        $yirik_palochka = Jobs::where('type_work_id',1)->whereBetween('date',[$from_date,$to_date])->get()->sum('type');
        $mayda_palochka = Jobs::where('type_work_id',2)->whereBetween('date',[$from_date,$to_date])->get()->sum('type');
        $ishchilar_ish_haqqi = Jobs::whereBetween('date',[$from_date,$to_date])->get()->sum('all_sum');
        $komunal1 = Gaz::whereBetween('date',[$from_date,$to_date])->get()->sum('money_paid');
        $komunal2 = Electric_Current::whereBetween('date',[$from_date,$to_date])->get()->sum('money_paid');
        $komunal=$komunal1+$komunal2;
        $chiqim = Outlay::whereBetween('from_date',[$from_date,$to_date])->get()->sum('all_summ');

        return view('adminpanel.statistic',[
            'ildiz'=>$ildiz,
            'mahsulot'=>$mahsulot,
            'moyka'=>$moyka,
            'kesilgan_slays_kg'=>$kesilgan_slays_kg,
            'kesilgan_slays_soat'=>$kesilgan_slays_soat,
            'kesilgan_tabletka_kg'=>$kesilgan_tabletka_kg,
            'kesilgan_tabletka_soat'=>$kesilgan_tabletka_soat,
            'ishchilar_ish_haqqi'=>$ishchilar_ish_haqqi,
            'yirik_palochka'=>$yirik_palochka,
            'mayda_palochka'=>$mayda_palochka,
            'komunal'=>$komunal,
            'chiqim'=>$chiqim,
        ]);

    }

    public function  all(){
//        $from_date = date('Y-m-d', Strtotime(now()));
//        $to_date = date('Y-m-d', Strtotime(now()));
        $ildiz = FirmIncome::all()->sum('weight');
        $mahsulot = Finished_Product::all()->sum('weight');
        $moyka = Jobs::where('type_work_id',3)->get()->sum('type');
        $kesilgan_slays_kg = Jobs::where('type_work_id',7)->get()->sum('type');
        $kesilgan_slays_soat = Jobs::where('type_work_id',8)->get()->sum('type');
        $kesilgan_tabletka_kg = Jobs::where('type_work_id',5)->get()->sum('type');
        $kesilgan_tabletka_soat = Jobs::where('type_work_id',6)->get()->sum('type');
        $yirik_palochka = Jobs::where('type_work_id',1)->get()->sum('type');
        $mayda_palochka = Jobs::where('type_work_id',2)->get()->sum('type');
        $ishchilar_ish_haqqi = Jobs::all()->sum('all_sum');
        $komunal1 = Gaz::all()->sum('money_paid');
        $komunal2 = Electric_Current::all()->sum('money_paid');
        $komunal=$komunal1+$komunal2;
        $chiqim = Outlay::all()->sum('all_summ');

        return view('adminpanel.statistic',[
            'ildiz'=>$ildiz,
            'mahsulot'=>$mahsulot,
            'moyka'=>$moyka,
            'kesilgan_slays_kg'=>$kesilgan_slays_kg,
            'kesilgan_slays_soat'=>$kesilgan_slays_soat,
            'kesilgan_tabletka_kg'=>$kesilgan_tabletka_kg,
            'kesilgan_tabletka_soat'=>$kesilgan_tabletka_soat,
            'ishchilar_ish_haqqi'=>$ishchilar_ish_haqqi,
            'yirik_palochka'=>$yirik_palochka,
            'mayda_palochka'=>$mayda_palochka,
            'komunal'=>$komunal,
            'chiqim'=>$chiqim,
        ]);

    }
}
