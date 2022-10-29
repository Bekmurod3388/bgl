<?php

namespace App\Http\Service;

use App\Models\FirmIncome;
use App\Models\FirmProvided;
use Illuminate\Support\Facades\DB;

class Firm
{
    public $table;

    public function __construct($table)
    {
        $this->table = $table;
    }

    public function firm_sum($array, $id = 0, $from_date = NULL, $to_date = NULL)
    {
        if ($id == 0)
            $data = json_decode(DB::table($this->table)->where('deleted_at', NULL)->get(), true);
        else {
            if ($from_date == NULL && $to_date == NULL)
                $data = json_decode(DB::table($this->table)->where('deleted_at', NULL)->where('firm_id', $id)->get(), true);
            else
                $data = json_decode(DB::table($this->table)->where('deleted_at', NULL)->where('firm_id', $id)->whereBetween('date', [$from_date, $to_date])->get(), true);
        }
        foreach ($array as $item) {
            $sum[$item] = 0;
        }
        $sum['cnt'] = 0;
        foreach ($data as $value) {

            foreach ($array as $item) {
                $sum[$item] += $value[$item];
            }
            $sum['cnt']++;
        }
        return $sum;
    }

    public function date($id, $from_date, $to_date)
    {
        if ($from_date == null && $to_date == null) {
            $firm_incomes = DB::table($this->table)->orderby('date', 'DESC')->where('deleted_at', NULL)->where('firm_id', $id)->get();
        } else {
            $firm_incomes = DB::table($this->table)->orderby('date', 'DESC')
                ->where('deleted_at', NULL)
                ->where('firm_id', $id)
                ->whereBetween('date', [$from_date, $to_date])
                ->get();
        }
        return $firm_incomes;
    }

    public function get_firm_name($id)
    {
        $name = \App\Models\Firm::where('id', $id)->first();
        return $name['name'];
    }

    public function firm_income($data, $id, $page)
    {
        if ($page == "store") {
            $netto = $data['brutto'] - $data['tara'];
            $firm_income = new FirmIncome();
            $firm_income['firm_id'] = $data['firm_id'];
            $firm_income['car_number'] = $data['car_number'];
            $firm_income['date'] = $data['date'];
            $firm_income['brutto'] = $data['brutto'];
            $firm_income['netto'] = $netto;
            $firm_income['tara'] = $data['tara'];
            $firm_income['soil'] = 0;
            $firm_income['weight'] = $netto;
            $firm_income['price'] = $data['price'];
            $firm_income['total_price'] = intval($data['price'] * $netto);
            $firm_income->save();
            $firm = \App\Models\Firm::find($id);
            $firm['all_sum'] += $firm_income['total_price'];
            $firm['indebtedness'] = $firm['all_sum'] - $firm['given_sum'];
            $firm->save();
        }
        if ($page == "update") {
            $firm_income = FirmIncome::find($id);
            $old_price = $firm_income['total_price'];
            $brutto = $data['brutto'];
            $tara = $data['tara'];
            $netto = ($brutto - $tara);
            $firm_income['brutto'] = $brutto;
            $firm_income['tara'] = $tara;
            $firm_income['soil'] = $data['soil'];
            $firm_income['weight'] = $netto - $firm_income['soil'];
            $firm_income['netto'] = $netto;
            $firm_income['total_price'] = $firm_income['weight'] * $firm_income['price'];
            $firm_income->save();
            $new_price = $firm_income['total_price'];
            $id = $firm_income['firm_id'];

            $firm = \App\Models\Firm::find($id);
            $firm['all_sum'] += ($new_price - $old_price);
            $firm['indebtedness'] = $firm['all_sum'] - $firm['given_sum'];
            $firm->save();
        }
    }

    public function firm_income_delete($id, $total_price)
    {
        $firm = \App\Models\Firm::find($id);
        $firm['all_sum'] -= $total_price;
        $firm['indebtedness'] -= $total_price;
        $firm->save();
    }

    public function firm_provided($data)
    {
        $price = $data['price'];
        $id = $data['firm_id'];
        $firm_provided = new FirmProvided();
        $firm_provided['firm_id'] = $id;
        $firm_provided['price'] = $price;
        $firm_provided['date'] = $data['date'];
        $firm_provided->save();

        $firm = \App\Models\Firm::find($id);
        $firm['given_sum'] += $price;
        $firm['indebtedness'] = $firm['all_sum'] - $firm['given_sum'];
        $firm->save();
    }

    public function firm_provided_delete($id)
    {
        $firm_provided = FirmProvided::find($id);
        $firm_id = $firm_provided['firm_id'];
        $price = $firm_provided['price'];
        $firm = \App\Models\Firm::find($firm_id);
        $firm['indebtedness'] += $price;
        $firm['given_sum'] -= $price;
        $firm->save();
        $firm_provided->delete();
    }

}
