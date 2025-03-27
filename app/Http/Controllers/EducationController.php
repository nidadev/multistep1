<?php

namespace App\Http\Controllers;

use App\Models\Education;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EducationController extends Controller
{
    //

    public function postCreateStepTwo(Request $request)
    {
       // dd($request);
        $validatedData = Validator::make($request->all(), [
            'name' => 'required',
            'degree' => 'required',
            'year' => 'required'
        ]);
        if($validatedData->passes())
        {
            Education::create([
                "name" => $request->name,
                //"degree" => $request->degree,
                //"year" => $request->year,
                //'user_id' => auth()->user()->id
            ]);
           
            return response()->json([
                'success' => 'added institute',
                'redirect_url' => route('products.step-three'),

            ],200);
        }
        else
        {

        return response()->json([
            'error' => $validatedData->errors()
        ]);
    }
    }
}
