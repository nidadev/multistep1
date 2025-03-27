<?php

namespace App\Http\Controllers;

use App\Models\Educate;
use App\Models\Product;
use App\Models\Education;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    //
    public function index()
    {
        $products = Product::all();
  
        return view('products.index',compact('products'));
    }
  
 
    public function createStepOne(Request $request)
    {
        $product = Product::all();
  
        return view('products.create-step-one',compact('product'));
    }
  
 
    public function postCreateStepOne(Request $request)
    {
       
        $validatedData = Validator::make($request->all(), [
            'name' => 'required|unique:products',
            'amount' => 'required|numeric',
        ]);
        if($validatedData->passes())
        {
            Product::create([
                "name" => $request->name,
                "amount" => $request->email,
                "description" => $request->desc
            ]);
           
            return response()->json([
                'success' => 'added',
                'redirect_url' => route('products.step-two'),

            ],200);
        }

        return response()->json([
            'error' => $validatedData->errors()
        ]);
        
        
    }
  
 
    public function createStepTwo(Request $request)
    {
        $product = Product::all();
  
        return view('products.create-step-two',compact('product'));
    }
  

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
            // Educate::create([
            //     "name" => $request->name,
            //     //"degree" => $request->degree,
            //     //"year" => $request->year,
            //     //'user_id' => auth()->user()->id
            // ]);

            DB::table('educates')->insert([
                "name" => $request->name,
            ]
            );
           
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
  
    public function createStepThree(Request $request)
    {
        //$product = $request->session()->get('product');
  
        return view('products.create-step-three');
    }
 
    public function postCreateStepThree(Request $request)
    {

        //get auth id 
        //and update pwd

        $validatedData = Validator::make($request->all(), [
            'password' => 'required',
           
        ]);
        if($validatedData->passes())
        {
            // Educate::create([
            //     "name" => $request->name,
            //     //"degree" => $request->degree,
            //     //"year" => $request->year,
            //     //'user_id' => auth()->user()->id
            // ]);

            DB::table('users')->where('id', auth()->user()->id)->update([
                "password" => Hash::make($request->password),
            ]
            );
           
            return response()->json([
                'success' => 'updated pwd',
                'redirect_url' => route('products.step-four'),

            ],200);
        }
        else
        {

        return response()->json([
            'error' => $validatedData->errors()
        ]);
    }
}
    public function createStepFour(Request $request)
    {
        
  
        return view('products.create-step-four');
    }

       
    
}
