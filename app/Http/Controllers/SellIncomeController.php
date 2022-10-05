<?php

namespace App\Http\Controllers;

use App\Models\Firm;
use App\Models\FirmIncome;
use App\Models\Product;
use App\Models\Sell;
use App\Models\SellIncome;
use Illuminate\Http\Request;

class SellIncomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $id = $request['id'];
        $sells = Sell::all();
        $products = Product::all();
        $sell_incomes = SellIncome::orderby('created_at', 'DESC')->where('sell_id', $id)->get();
        $kg = 0;
        $total_sum = 0;

        foreach ($sell_incomes as $date){
            $kg += $date['kg'];
            $total_sum += $date['total_sum'];
        }

        return view('sells.sell_icomes.index',[
            'products' => $products,
            'sells' => $sells,
            'sell_incomes' => $sell_incomes,
            'kg' => $kg,
            'total_sum' => $total_sum,
            'id' => $id,

        ]);


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id = $request['sell_id'];

        $request->validate([
            'sell_id' => "required",
            'product_id' => "required",
            'car_number' => "required",
            'how_sum' => "required",
            'kg' => "required",
        ]);

        $total_sum = $request->kg* $request->how_sum;

        $sell_income = new SellIncome();
        $sell_income->sell_id = $request->sell_id;
        $sell_income->car_number = $request->car_number;
        $sell_income->product_id = $request->product_id;
        $sell_income->kg = $request->kg;
        $sell_income->how_sum = $request->how_sum;
        $sell_income->total_sum = $total_sum;
        $sell_income->save();


        $sell = Sell::find($id);
        $sell['all_sum'] += $total_sum;
        $sell['indebtedness'] = $sell['all_sum'] - $sell['given_sum'];
        $sell->save();

        return redirect()->back()->with("success", "Sotish muvaffaqqiyatli yaratildi");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SellIncome  $sellIncome
     * @return \Illuminate\Http\Response
     */
    public function show(SellIncome $sellIncome)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SellIncome  $sellIncome
     * @return \Illuminate\Http\Response
     */
    public function edit(SellIncome $sellIncome)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SellIncome  $sellIncome
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SellIncome $sellIncome)
    {
        $id = $request->id;
        $total_sum = $request->kg * $request->how_sum;

        $sell_icome = SellIncome::find($id);
        $sell_icome->car_number = $request->car_number;
        $sell_icome->product_id = $request->product_id;
        $sell_icome->kg = $request->kg;
        $sell_icome->how_sum = $request->how_sum;
        $old_sum = $sell_icome->total_sum;
        $sell_icome->total_sum = $total_sum;
        $sell_icome->save();

        $sells = Sell::find($sell_icome->sell_id);
        $sells['all_sum'] += ($total_sum-$old_sum);
        $sells['indebtedness'] = $sells['all_sum'] - $sells['given_sum'];
        $sells->save();

        return redirect()->back()->with("success", "Sotish muvaffaqqiyatli tahrirlandi");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SellIncome  $sellIncome
     * @return \Illuminate\Http\Response
     */
    public function destroy(SellIncome $sellIncome)
    {
        $id = $sellIncome['sell_id'];
        $total_sum = $sellIncome['total_sum'];

        $sell = Sell::find($id);
        $sell['all_sum'] -= $total_sum;
        $sell['indebtedness'] -= $total_sum;
        $sell->save();

        $sellIncome->delete();
        return redirect()->back()->with("success", "Sotish muvaffaqqiyatli o'chirildi");;
    }
}
