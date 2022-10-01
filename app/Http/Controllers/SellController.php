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

        $sel = [];
        foreach ($sells as $s) {
            $sel[$s->id] = $s;
        }

        $products = Product::all();
        $works = Work::all();

        return view('sells.index', [
                'sells' => $sells,
                'products' => $products,
                'sel' => $sel,
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        dd($request);
        $sell = new Sell();
        $sell->maxsulot_id = $request->maxsulot_id;
        $sell->kimga = $request->kimga;
        $sell->necha_somdan = $request->necha_somdan;
        $sell->kg = $request->kg;
        $sell->jami_summ = $request->jami_summ;
        $sell->bergan_summ = $request->bergan_summ;
        $sell->qarzdorlik = $request->qarzdorlik;
        $sell->sanasi = $request->sanasi;
        $sell->avto_raqam = $request->avto_raqam;

        $sell->save();
        return  redirect()->route('sells.index')->with('success','Sotish Muffaqatli yaratildi');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sell  $sell
     * @return \Illuminate\Http\Response
     */
    public function show(Sell $sell)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sell  $sell
     * @return \Illuminate\Http\Response
     */
    public function edit(Sell $sell)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sell  $sell
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
//        dd($request);

        $sell =  Sell::find($id);
        $sell->maxsulot_id = $request->maxsulot_id;
        $sell->kimga = $request->kimga;
        $sell->necha_somdan = $request->necha_somdan;
        $sell->kg = $request->kg;
        $sell->jami_summ = $request->jami_summ;
        $sell->bergan_summ = $request->bergan_summ;
        $sell->qarzdorlik = $request->qarzdorlik;
        $sell->sanasi = $request->sanasi;
        $sell->avto_raqam = $request->avto_raqam;

        $sell->save();
        return  redirect()->route('sells.index')->with('success','Sotish Muffaqatli tahrirlandi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sell  $sell
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $sells = Sell::find($id);
        $sells->delete();
        return  redirect()->route('sells.index')->with('success','Sotish Muvoffaqtli ochirildi');
    }
}
