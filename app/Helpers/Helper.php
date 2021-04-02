<?php


namespace App\Helpers;


use Illuminate\Support\Carbon;

class Helper
{
    public static function generateId($model, $field, $prefix, $length = 5)
    {
        $data  = $model::orderBy('id', 'desc')->first();
        $years = Carbon::now()->format('y');

        if (!$data) {
            $og_length   = $length;
            $last_number = '';
        } else {
            $year = substr($data->$field, -2);

            if ($year != $years) {
                $og_length   = $length;
                $last_number = '';
            } else {
                $code               = substr($data->$field, strlen($prefix) + 1, -3);
                $act_last_no        = ($code / 1) * 1;
                $inc_last_no        = $act_last_no + 1;
                $last_number_length = strlen($inc_last_no);
                $og_length          = $length - $last_number_length;
                $last_number        = $inc_last_no;
            }
        }

        $zeros = "";
        for ($i = 0; $i < $og_length; $i++) {
            $zeros .= "0";
        }

        return $prefix . '-' . $zeros . $last_number . '/' . $years;
    }
}
