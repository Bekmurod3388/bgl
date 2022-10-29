<?php

namespace App\Http\Controllers;

use App\Http\Requests\FirmProvidedRequest;
use App\Models\Firm;
use App\Models\FirmProvided;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class FirmProvidedController extends Controller
{
    public $firm;
    public function __construct()
    {
        $this->firm = new \App\Http\Service\Firm('firm_provideds');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $id = $request['id'];
        $indebtedness = Firm::find($id)->indebtedness;
        $from_date = $request['from_date'];
        $to_date = $request['to_date'];
        $name = $this->firm->get_firm_name($id);
        $firm_provided = $this->firm->date($id, $from_date, $to_date);
        $sum = $this->firm->firm_sum(['price'], $id, $from_date, $to_date);
        return view("firm.firm_provided.index", compact("name","id", "firm_provided", "sum","from_date","to_date","indebtedness"));
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
    public function store(FirmProvidedRequest $request)
    {
        $data = $request->validated();
        $this->firm->firm_provided($data);
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
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        abort(404);
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
        abort(404);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->firm->firm_provided_delete($id);
        return redirect()->back()->with("success", "Firma oldi berdi muvaffaqqiyatli yaratildi");
    }

    public function download(Request $request)
    {
        $id = $request['id'];
        $from_date = $request['from_date'];
        $to_date = $request['to_date'];
        $page = $request['page'];
        $name = $this->firm->get_firm_name($id);
        $firm_provided = $this->firm->date($id, $from_date, $to_date);
        $sum = $this->firm->firm_sum(['price'], $id, $from_date, $to_date);
        $pdf = PDF::loadView('firm.firm_provided.download', compact("name","id", "firm_provided", "sum","from_date","to_date"));
        $pdf->setPaper('A4', 'landscape');
        if ($page == 'download')
            return $pdf->download('firm_provided.pdf');
        if ($page == 'view')
            return $pdf->stream('firm_provided.pdf');
    }
}
