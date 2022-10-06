<?php

namespace App\Http\Controllers;

use App\Models\Sell;
use App\Models\SellProvided;
use Illuminate\Http\Request;

class SellProvidedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $sell_id = $request->id;

        $sell_provided = SellProvided::where('sell_id', $sell_id)->get();

        $all_sum = 0;
        $cnt=0;

        foreach ($sell_provided as $date){
            $all_sum += $date['given_sum'];
            $cnt++;
        }

        return view("sells.sell_provided.index", [
            "sell_provided" => $sell_provided,
            "sell_id" => $sell_id,
            "all_sum" => $all_sum,
            "cnt"=>$cnt,
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

        $request->validate([
            'sell_id'=>"required",
            'given_sum'=>"required",
            'date'=>"required",
            ]
        );

        $id = $request->sell_id;
        $sum = $request->given_sum;
        $date = $request->date;

        $sell_provided = new SellProvided();
        $sell_provided->sell_id = $id;
        $sell_provided->given_sum = $sum;
        $sell_provided->date = $date;
        $sell_provided->save();

        $sells = Sell::find($id);
        $sells->given_sum += $sum;
        $sells->indebtedness = $sells->all_sum - $sum;
        $sells->save();

        return redirect()->back()->with("success", "Sotish oldi berdi muvaffaqqiyatli yaratildi");


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SellProvided  $sellProvided
     * @return \Illuminate\Http\Response
     */
    public function show(SellProvided $sellProvided)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SellProvided  $sellProvided
     * @return \Illuminate\Http\Response
     */
    public function edit(SellProvided $sellProvided)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SellProvided  $sellProvided
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SellProvided $sellProvided)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SellProvided  $sellProvided
     * @return \Illuminate\Http\Response
     */
    public function destroy(SellProvided $sellProvided)
    {
        $id = $sellProvided->sell_id;
        $given_sum = $sellProvided->given_sum;

        $sell = Sell::find($id);
        $sell->given_sum -= $given_sum;
        $sell->indebtedness = $sell->all_sum - $sell->given_sum;
        $sell->save();

        $sellProvided->delete();

        return redirect()->back()->with("success", "Sotish oldi berdi muvaffaqqiyatli o'chirildi");

    }
}
