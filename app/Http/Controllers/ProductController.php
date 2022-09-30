<?php

namespace App\Http\Controllers;

use App\Models\Firm;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product=Product::all();

        $products=[];
        foreach ($product as $product){
            $products[$product->id]=$product;
        }
        return view('product.product',[
            'products'=>$products,
            'productes'=>$products,
        ]);
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
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
//dd($request);
        $request->validate([
            'name'=>'required'
        ]);
        $proruct=new Product();
        $proruct->name=$request['name'];
        $proruct->minimum_price=$request['minimum_price'];
        $proruct->maximum_price=$request['maximum_price'];

        $proruct->save();
        return redirect()->route('products.index')->with('success', 'Mahsulot muvaffaqqiyatli yaratildi');

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
            'name'=>'required'
        ]);
        $produt= Product::find($id);
        $produt->name=$request['name'];
        $produt->minimum_price=$request['minimum_price'];
        $produt->maximum_price=$request['maximum_price'];
        $produt->save();
        return redirect()->route('products.index')->with('success', 'Mahsulot muvaffaqqiyatli tahrirlandi');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product=Product::find($id);
        $product->delete();
        return redirect()->route('products.index')->with('success'   ,'Mahsulot muvaffaqqiyatli o`chirildi');

    }
}
