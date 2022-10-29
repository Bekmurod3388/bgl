<?php

namespace App\Http\Controllers;

use App\Http\Requests\FirmIncomeRequest;
use App\Models\Firm;
use App\Models\FirmIncome;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FirmIncomeController extends Controller
{
    public $firm;
    public function __construct()
    {
        $this->firm = new \App\Http\Service\Firm('firm_incomes');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $id = $request['id'];
        $from_date = $request['from_date'];
        $to_date = $request['to_date'];
        $name = $this->firm->get_firm_name($id);
        $firm_incomes = $this->firm->date($id, $from_date, $to_date);
        $sum = $this->firm->firm_sum(['total_price', 'brutto', 'netto', 'tara', 'soil', 'weight','price'], $id, $from_date, $to_date);
        return view("firm.firm_incomes.index", compact('firm_incomes', 'name', 'id', 'sum', 'from_date', 'to_date'));
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(FirmIncomeRequest $request)
    {
        $id = $request['firm_id'];
        $data = $request->validated();
        $this->firm->firm_income($data, $id, "store");
        return redirect()->back()->with("success", "Firma kirim muvaffaqqiyatli yaratildi");
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\FirmIncome $firmIncome
     * @return \Illuminate\Http\Response
     */
    public function show(FirmIncome $firmIncome)
    {
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\FirmIncome $firmIncome
     * @return \Illuminate\Http\Response
     */
    public function edit(FirmIncome $firmIncome)
    {
        abort(404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\FirmIncome $firmIncome
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $id = $request['id'];
        $this->firm->firm_income($request->all(), $id, "update");
        return redirect()->back()->with("success", "Firma kirim muvaffaqqiyatli tahrirlandi");;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\FirmIncome $firmIncome
     * @return \Illuminate\Http\Response
     */
    public function destroy(FirmIncome $firmIncome)
    {
        $id = $firmIncome['firm_id'];
        $total_price = $firmIncome['total_price'];
        $this->firm->firm_income_delete($id, $total_price);
        $firmIncome->delete();
        return redirect()->back()->with("success", "Firma kirim muvaffaqqiyatli o'chirildi");
    }

    public function download(Request $request)
    {
        $id = $request['id'];
        $from_date = $request['from_date'];
        $to_date = $request['to_date'];
        $page = $request['page'];
        $name = $this->firm->get_firm_name($id);
        $firm_incomes = $this->firm->date($id, $from_date, $to_date);
        $sum = $this->firm->firm_sum(['total_price', 'brutto', 'netto', 'tara', 'soil', 'weight','price'], $id, $from_date, $to_date);
        $pdf = PDF::loadView("firm.firm_incomes.download", compact('firm_incomes', 'name', 'id', 'sum', 'from_date', 'to_date'));
        $pdf->setPaper('A4', 'landscape');
        if ($page == 'download')
            return $pdf->download('firm_income.pdf');
        if ($page == 'view')
            return $pdf->stream('firm_income.pdf');
    }

}
