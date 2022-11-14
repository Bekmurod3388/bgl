<?php

namespace App\Http\Service;

use Illuminate\Support\Facades\DB;

class Chart{
   public function index($table, $label_table, $lable_column, $lable_key, $date_column, $group_column, $return_column, $from_date=NULL, $to_date=NULL){
       if ($date_column == 'created_at' && $from_date != NULL){
           $from_date.=' 00:00:00';
           $to_date.=' 23:59:59';
       }
//       dd($from_date, $to_date);
       if ($from_date != NULL)
       $data = DB::table($table)->whereBetween($date_column, [$from_date, $to_date])->get();
       else
           $data = DB::table($table)->get();
       $labels = DB::table($label_table)->pluck($lable_column, $lable_key);
       $data = $data->groupBy($group_column);
       $values = [];
       foreach ($labels as $key => $label) {
           $values[$key] = 0;
       }
       foreach ($data as $item) {
           foreach ($item as $value){
               if (isset($values[$value->$group_column]))
               $values[$value->$group_column] += $value->$return_column;
               else {
                   $values[$value->$group_column] = 0;
                   $values[$value->$group_column] += $value->$return_column;
               }
           }
       }
       $lab = [];
       $val = [];
       $response = [];
       foreach ($values as $key=>$value)
       {
           array_push($lab, $labels[$key]);
           array_push($val, $value);
       }
       array_push($val, 0);
       $response['labels'] = $lab;
       $response['values'] = $val;
       return $response;
   }
}
