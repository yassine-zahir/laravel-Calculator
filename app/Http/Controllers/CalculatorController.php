<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CalculatorController extends Controller
{
    public function SubmitCalculator(Request $request)
    {
        $operator = $request->operator;
        $first_number = $request->first_number;
        $second_number = $request->second_number;
        $resultat = 0;

        switch($operator)
        {
            case('plus'): $resultat = $first_number + $second_number;
            break;

            case('minus'): $resultat = $first_number - $second_number;
            break;

            case('multiple'): $resultat = $first_number * $second_number;
            break;

            case('division'): $second_number == 0 ? $resultat = 0 : $resultat = $first_number / $second_number;
            break;

            default: $resultat = 0;

        }

        return redirect("/Calculator")->with('info','The Result is: ' . $resultat);

    }
}
