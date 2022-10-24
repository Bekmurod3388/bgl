<?php

namespace App\Http\Controllers;

use App\Models\Jobs;
use App\Models\Product;
use App\Models\Sell;
use App\Models\Work;
use App\Models\Worker;
use Illuminate\Http\Request;

class SellController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sells = Sell::orderBy('created_at', 'desc')->paginate(4);
        $sels=[];
        $sum_price = 0;
        $sum_indebtedness = 0;
        $sum_given = 0;
        $cnt = 0;

        foreach ($sells as $sel){
            $sels[$sel->id]=$sel;
            $sum_given += $sel['given_sum'];
            $sum_indebtedness += $sel['indebtedness'];
            $sum_price += $sel['all_sum'];
            $cnt++;
        }

        $products = Product::all();

        return view('sells.sell', [
                'sells' => $sells,
                'sels' => $sels,
                'products' => $products,
                'sum_given'=>$sum_given,
                'sum_indebtedness'=>$sum_indebtedness,
                'sum_price'=>$sum_price,
                'cnt'=>$cnt,

            ]
        );
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        dd($request);
        $request->validate([
            'whom' => 'required',
        ]);

        $sell = new Sell();
        $sell->whom = $request->whom;
//        $sell->given_sum = $request->given_sum;
        $sell->given_sum = 0;
        $sell->all_sum = 0;
        $sell->indebtedness = 0;
        $sell->save();
        return redirect()->route('sells.index')->with('success', 'Sotish Muffaqatli yaratildi');

    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Sell $sell
     * @return \Illuminate\Http\Response
     */
    public function show(Sell $sell)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Sell $sell
     * @return \Illuminate\Http\Response
     */
    public function edit(Sell $sell)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Sell $sell
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'sell_id' => 'required',
            'whom' => 'required',
//            'given_sum' => 'required',
        ]);

        $sell = Sell::find($request->sell_id);
        $sell->whom = $request->whom;
//        $sell->given_sum += $request->given_sum;
//        $sell->indebtedness -= $request->given_sum;
        $sell->save();

        return redirect()->route('sells.index')->with('success', 'Sotish Muffaqatli tahrirlandi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Sell $sell
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sells = Sell::find($id);
        $sells->delete();
        return redirect()->route('sells.index')->with('success', 'Sotish Muvoffaqtli ochirildi');
    }
}
