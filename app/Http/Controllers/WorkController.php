<?php

namespace App\Http\Controllers;

use App\Models\Work;
use App\Models\Tur;
use Illuminate\Http\Request;
use Illuminate\View\View;

class WorkController extends Controller
{
    public function index()
    {

        $works=Work::orderBy('created_at','desc')->paginate(4);
        $ishs=[];
        foreach ($works as $ish){
            $ishs[$ish->id]=$ish;
        }




        $create=Tur::all();
        return view('work.work',compact('works','ishs','create'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $result=$request->validate(
            [
                'name'=>'required',
                'type'=>'required',
                'price'=>'required'
            ]
        );
        $ish=new Work();
        $ish->name=$request->name;
        $ish->type=$request->type;
        $ish->price=$request->price;
        $ish->save();
        $status = 'success';
        $message = "Yangi Ish nomi muvaffaqqiyatli yaratildi";

        $works=Work::orderBy('created_at','desc')->paginate(4);
        $ishs=[];
        foreach ($works as $ish){
            $ishs[$ish->id]=$ish;
        }
        $create=Tur::all();
        return view('work.work',compact('status','message','ishs','works','create'))->with('success','Ish nomi yaratildi');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Work  $work
     * @return \Illuminate\Http\Response
     */
    public function show(Work $work)
    {
        //
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {


//        return  view('ishturi',compact('create'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Work  $work
     * @return \Illuminate\Http\Response
     */
    public function edit(Work $work)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Work  $ishturi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $id = $request->id;
        $result=$request->validate(
            [
                'name'=>'required',
                'type'=>'required',
                'price'=>'required'
            ]
        );
        $ish=Work::find($id);
        $ish->name=$request->name;
        $ish->type=$request->type;
        $ish->price=$request->price;
        $ish->save();
        $status = 'success';
        $message = "Yangi Ish nomi muvaffaqqiyatli tahirilandi";

        $works=Work::orderBy('created_at','desc')->paginate(4);
        $ishs=[];
        foreach ($works as $ish){
            $ishs[$ish->id]=$ish;
        }
        $create=Tur::all();
        return view('work.work',compact('status','message','ishs','works','create'))->with('success','Ish nomi yaratildi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Work  $ishturi
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $work=Work::find($id);
        $work->delete();
        $status = 'success';
        $message = "Yangi Ish nomi muvaffaqqiyatli O'chiriildi";

        $works=Work::orderBy('created_at','desc')->paginate(4);
        $ishs=[];
        foreach ($works as $ish){
            $ishs[$ish->id]=$ish;
        }
        $create=Tur::all();
        return view('work.work',compact('status','message','ishs','works','create'))->with('success','Ish nomi yaratildi');
    }
}
