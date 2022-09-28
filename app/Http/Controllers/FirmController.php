<?php

namespace App\Http\Controllers;

use App\Models\Firm;
use Illuminate\Http\Request;

class FirmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $firms = Firm::all();
        $firmes=[];
        foreach ($firms as $firm){
            $firmes[$firm->id]=$firm;
        }
        return view('firms',[
            'firms'=>$firms,
            'firmes'=>$firmes
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('firm.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required'
        ]);
        $firm=new Firm();
        $firm->name=$request['name'];
        $firm->all_sum=0;
        $firm->indebtedness=0;
        $firm->given_sum=0;
        $firm->save();
        return redirect()->route('firms.index')->with('success', 'Firma muvaffaqqiyatli yaratildi');
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

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $id=$request['id'];
        $request->validate([
            'name'=>'required'
        ]);
        $firm= Firm::find($id);
        $firm->name=$request['name'];
        $firm->save();
        return redirect()->route('firms.index')->with('success', 'Firma muvaffaqqiyatli tahrirlandi');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request,$firm)
    {
        $firm=Firm::find($firm);
        $firm->delete();
        return redirect()->route('firms.index')->with('success'   ,'Firma muvaffaqqiyatli o`chirildi');
    }
}
