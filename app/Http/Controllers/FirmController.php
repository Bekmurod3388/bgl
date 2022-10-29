<?php

namespace App\Http\Controllers;

use App\Http\Requests\FirmRequest;
use App\Models\Firm;
use Illuminate\Http\Request;

class FirmController extends Controller
{
    public $firm;
    public function __construct()
    {
        $this->firm = new \App\Http\Service\Firm('firms');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $firms = Firm::all();
        $sum = $this->firm->firm_sum(['all_sum', 'indebtedness', 'given_sum']);
        return view('firm.firms', compact('firms', 'sum'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort(404);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(FirmRequest $request)
    {
        $data = $request->validated();
        Firm::create($data);
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
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        abort(404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(FirmRequest $request, $id)
    {
        $id=$request['id'];
        $data = $request->validated();
        Firm::find($id)->update($data);
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
        Firm::find($firm)->delete();
        return redirect()->route('firms.index')->with('success'   ,'Firma muvaffaqqiyatli o`chirildi');
    }
}
