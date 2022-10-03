<?php

namespace App\Http\Controllers;

use App\Models\Outlay;
use Illuminate\Http\Request;

class OutlayController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $outlay = Outlay::all();

        $products=[];
        foreach ($outlay as $product){
            $products[$product->id]=$product;
        }
        return view('outlay.index',[
            'outlay'=>$outlay,
            'productes'=>$products,
        ]);

        //  return view('outlay.index', compact('outlay'));

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
            'date'=>'required',
            'outlay_name' => 'required',
            'summ' => 'required',
            'one_summ' => 'required',

        ]);
        $outlay=new Outlay();
        $outlay->date=$request['date'];
        $outlay->outlay_name=$request['outlay_name'];
        $outlay->summ=$request['summ'];
        $outlay->one_summ=$request['one_summ'];

        $outlay->all_summ=$request['summ' ] * $request['one_summ'];
        $outlay->save();
        return redirect()->route('outlay.index')->with('success', 'Mahsulot muvaffaqqiyatli yaratildi');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $id=$request['id'];
        $request->validate([
            'date'=>'required',
            'outlay_name' => 'required',
            'summ' => 'required',
            'one_summ' => 'required'
        ]);
        $outlay= Outlay::find($id);
        $outlay->date=$request['date'];
        $outlay->outlay_name=$request['outlay_name'];
        $outlay->summ=$request['summ'];
        $outlay->one_summ=$request['one_summ'];
        $outlay->save();
        return redirect()->route('outlay.index')->with('success', 'Mahsulot muvaffaqqiyatli tahrirlandi');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $outlay=Outlay::find($id);
        $outlay->delete();
        return redirect()->route('outlay.index')->with('success' ,'Mahsulot muvaffaqqiyatli o`chirildi');

    }
}
