<?php

namespace App\Http\Controllers;

use App\Models\Firm;
use App\Models\FirmProvided;
use Illuminate\Http\Request;

class FirmProvidedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $id = $request['id'];
        $firm_provided = FirmProvided::orderby('date', 'DESC')->where('firm_id', $id)->get();
        $sum_price = 0;
        foreach ($firm_provided as $date)
            $sum_price += $date['price'];
        return view("firm.firm_provided.index", compact("id", "firm_provided", "sum_price"));
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
        $data = $request->validate([
            'firm_id' => "required",
            'price' => "required",
            'date' => "required",
        ]);
        $price = $request['price'];
        $id = $request['firm_id'];
        $firm_provided = new FirmProvided();
        $firm_provided['firm_id'] = $id;
        $firm_provided['price'] = $price;
        $firm_provided['date'] = $request['date'];
        $firm_provided->save();

        $firm = Firm::find($id);
        $firm['given_sum'] += $price;
        $firm['indebtedness'] = $firm['all_sum'] - $firm['given_sum'];
        $firm->save();
        return redirect()->back()->with("success", "Firma oldi berdi muvaffaqqiyatli yaratildi");
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $firm_provided = FirmProvided::find($id);
        $firm_id = $firm_provided['firm_id'];
        $price = $firm_provided['price'];
        $firm = Firm::find($firm_id);
        $firm['indebtedness'] += $price;
        $firm['given_sum'] -= $price;
        $firm->save();
        $firm_provided->delete();
        return redirect()->back()->with("success", "Firma oldi berdi muvaffaqqiyatli yaratildi");
    }
}
