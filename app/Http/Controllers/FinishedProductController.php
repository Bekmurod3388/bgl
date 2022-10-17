<?php

namespace App\Http\Controllers;

use App\Models\Finished_Product;
use App\Models\Product;
use App\Models\Warehouse;
use Illuminate\Http\Request;
use function PHPUnit\Framework\isNull;

class FinishedProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $finished_products=Finished_Product::all();
        $products=Product::all();
//        dd($products);
        return view('finished.product',compact('finished_products','products'));

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
        $id=$request['product_id'];
//dd($id);
        $products=new Finished_Product();
//        dd($request);
        $products->product_id=$request->product_id;
        $products->date=$request->date;
        $products->weight=$request->weight;
        $products->save();
        $warehouese=Warehouse::where('product_id',$id)->first();
//        dd($warehouese);
    if($warehouese != NULL)
    {
        $data=Warehouse::where('product_id',$id)->first();
        $old_weight = $data['weight'];
        $data->product_id=$request->product_id;
        $data->weight=$request->weight + $old_weight;
        $data->save();

    }
    else {
        $data=new Warehouse();
        $data->product_id=$request->product_id;
        $data->weight=$request->weight;
        $data->save();
    }
        return  redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Finished_Product  $finished_Product
     * @return \Illuminate\Http\Response
     */
    public function show(Finished_Product $finished_Product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Finished_Product  $finished_Product
     * @return \Illuminate\Http\Response
     */
    public function edit(Finished_Product $finished_Product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Finished_Product  $finished_Product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Finished_Product $finished_Product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Finished_Product  $finished_Product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $finished_product=Finished_Product::find($id);
        $new_weight=$finished_product['weight'];
        $product_id=$finished_product['product_id'];

        $warehouse=Warehouse::where('product_id',$product_id)->first();
        $warehouse['weight']-=$new_weight;
        $finished_product->delete();
        $warehouse->save();
        return redirect()->back();

    }
}
