<?php

namespace App\Http\Controllers;

use App\Models\Firm;
use App\Models\FirmIncome;
use Illuminate\Http\Request;

class FirmIncomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $firms = Firm::all();
        $firm_incomes = FirmIncome::all();
        return view("admin.firm_incomes.index", compact("firm_incomes", "firms"));
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
        $data = $request->validate([
           'firm_id' => "required",
           'car_number' => "required",
           'brutto' => "required",
           'tara' => "required",
           'price' => "required",
        ]);
//        dd($data);
        $netto = $request['brutto'] - $request['tara'];
        $firm_income = new FirmIncome();
        $firm_income['firm_id'] = $request['firm_id'];
        $firm_income['car_number'] = $request['car_number'];
        $firm_income['brutto'] = $request['brutto'];
        $firm_income['netto'] = $netto;
        $firm_income['tara'] = $request['tara'];
        $firm_income['soil'] = 0;
        $firm_income['price'] = $request['price'];
        $firm_income['total_price'] = intval($request['price'] * $netto);
        $firm_income->save();
        return redirect()->route("firm_incomes.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FirmIncome  $firmIncome
     * @return \Illuminate\Http\Response
     */
    public function show(FirmIncome $firmIncome)
    {
        dd("show");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FirmIncome  $firmIncome
     * @return \Illuminate\Http\Response
     */
    public function edit(FirmIncome $firmIncome)
    {
        dd("edit");
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FirmIncome  $firmIncome
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $id = $request['id'];
        $firm_income = FirmIncome::find($id);
        $netto = $firm_income['netto'] - $request['soil'];
        $firm_income['soil'] = $request['soil'];
        $firm_income['netto'] = $netto;
        $firm_income['total_price'] = $netto * $firm_income['price'];
        $firm_income->save();
        return redirect()->route("firm_incomes.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FirmIncome  $firmIncome
     * @return \Illuminate\Http\Response
     */
    public function destroy(FirmIncome $firmIncome)
    {
        $firmIncome->delete();
        return redirect()->route("firm_incomes.index");
    }
}
