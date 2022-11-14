<?php

namespace App\Http\Controllers;

use App\Models\Firm;
use App\Models\FirmIncome;
use App\Models\Product;
use App\Models\Sell;
use App\Models\SellIncome;
use App\Models\Warehouse;
use Illuminate\Http\Request;

class SellIncomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $id = $request['id'];
        $sells = Sell::all();
        $products = Product::all();
        $warehouses = Warehouse::all();
        $sell_incomes = SellIncome::orderby('created_at', 'DESC')->where('sell_id', $id)->get();
        $kg = 0;
        $total_sum = 0;

        foreach ($sell_incomes as $date) {
            $kg += $date['kg'];
            $total_sum += $date['total_sum'];
        }

        return view('sells.sell_icomes.index', [
            'products' => $products,
            'sells' => $sells,
            'sell_incomes' => $sell_incomes,
            'warehouses' => $warehouses,
            'kg' => $kg,
            'total_sum' => $total_sum,
            'id' => $id,
        ]);


    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $id = $request['sell_id'];

        $request->validate([
            'sell_id' => "required",
            'product_id' => "required",
            'car_number' => "required",
            'how_sum' => "required",
            'kg' => "required",
        ]);

        $product_weight = Warehouse::where('product_id', $request->product_id)->get();
        $total_sum = $request->kg * $request->how_sum;

        if ($request->kg <= $product_weight[0]['weight']) {

            $sell_income = new SellIncome();
            $sell_income->sell_id = $request->sell_id;
            $sell_income->car_number = $request->car_number;
            $sell_income->product_id = $request->product_id;
            $sell_income->kg = $request->kg;
            $sell_income->how_sum = $request->how_sum;
            $sell_income->total_sum = $total_sum;
            $sell_income->save();

            $product = $product_weight[0];
            $product->weight = $product_weight[0]['weight'] - $request->kg;
            $product->save();

            $sell = Sell::find($id);
            $sell['all_sum'] += $total_sum;
            $sell['indebtedness'] = $sell['all_sum'] - $sell['given_sum'];
            $sell->save();

            return redirect()->back()->with("success", "Sotish muvaffaqqiyatli yaratildi");

        } else {
            return redirect()->back()->with("wrong", "Bu hajmdagi mahsulot tayyor emas");
        }


    }


    public function update(Request $request, $id)

    {
        $request->validate([
            'product_id' => "required",
            'car_number' => "required",
            'how_sum' => "required",
            'kg' => "required",
        ]);

        $sellIncome = SellIncome::find($request->id);
        $warehouse = Warehouse::where('product_id', $sellIncome->product_id)->first();

        $old_kg = $request->old_kg;

        if ($old_kg > $request->kg) {
            $id = $request->id;
            $total_sum = $request->kg * $request->how_sum;

            $sell_icome = SellIncome::find($id);

            $sell_icome->car_number = $request->car_number;
            $sell_icome->product_id = $request->product_id;
            $sell_icome->kg = $request->kg;
            $sell_icome->how_sum = $request->how_sum;
            $old_sum = $sell_icome->total_sum;
            $sell_icome->total_sum = $total_sum;
            $sell_icome->save();

            $sells = Sell::find($sell_icome->sell_id);
            $sells['all_sum'] += ($total_sum - $old_sum);
            $sells['indebtedness'] = $sells['all_sum'] - $sells['given_sum'];
            $sells->save();

            $warehouse['weight'] += ($old_kg - $request->kg);
            $warehouse->save();

            return redirect()->back()->with("success", "Sotish muvaffaqqiyatli yangilandi");

        } else {
            if ($request->kg - $old_kg <= $warehouse['weight']) {
                $id = $request->id;
                $total_sum = $request->kg * $request->how_sum;

                $sell_icome = SellIncome::find($id);

                $sell_icome->car_number = $request->car_number;
                $sell_icome->product_id = $request->product_id;
                $sell_icome->kg = $request->kg;
                $sell_icome->how_sum = $request->how_sum;
                $old_sum = $sell_icome->total_sum;
                $sell_icome->total_sum = $total_sum;
                $sell_icome->save();

                $sells = Sell::find($sell_icome->sell_id);
                $sells['all_sum'] += ($total_sum - $old_sum);
                $sells['indebtedness'] = $sells['all_sum'] - $sells['given_sum'];
                $sells->save();

                $warehouse['weight'] -= ($request->kg - $old_kg);
                $warehouse->save();

                return redirect()->back()->with("success", "Sotish muvaffaqqiyatli yangilandi");

            } else {
                return redirect()->back()->with("wrong", "Bu hajmdagi mahsulot tayyor emas");
            }


        }

    }


    public function destroy(SellIncome $sellIncome)
    {

        $id = $sellIncome['sell_id'];
        $total_sum = $sellIncome['total_sum'];

        $warehouse = Warehouse::where('product_id', $sellIncome->product_id)->first();
        $warehouse['weight'] += $sellIncome->kg;
        $warehouse->save();


        $sell = Sell::find($id);
        $sell['all_sum'] -= $total_sum;
        $sell['indebtedness'] -= $total_sum;
        $sell->save();

        $sellIncome->delete();
        return redirect()->back()->with("success", "Sotish muvaffaqqiyatli o'chirildi");;
    }
}
