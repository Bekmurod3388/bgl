<?php

namespace App\Http\Controllers;

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
        $sell_incomes = SellIncome::orderby('created_at', 'DESC')->where('sell_id', $id)->get();
        $how_sum = 0;
        $total_sum = 0;
        foreach ($sell_incomes as $date){
            $how_sum += $date['how_sum'];
            $total_sum += $date['total_sum'];
        }

        return view('sells.sell_icomes.index',[
            'sells' => $sells,
            'sell_incomes' => $sell_incomes,
            'how_sum' => $how_sum,
            'total_sum' => $total_sum,

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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SellIncome  $sellIncome
     * @return \Illuminate\Http\Response
     */
    public function destroy(SellIncome $sellIncome)
    {
        //
    }
}
