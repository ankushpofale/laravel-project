<?php

namespace App\Http\Controllers;

use App\Models\newcustomers;
use Illuminate\Http\Request;
use Auth;
use Validator;
class NewcustomersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customer = newcustomers::get();
        return response()->json( $customer, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        $validater = Validator::make($request->all(),[
            'name'=>'required'   
        ]);
        if($validater->fails()){
            $response =[
                'sucess'=>false,
                'message'=>$validater->errors(),
            ];
            return response()->json($response, 400);
            }
            $input = $request->all();
            $customer = newcustomers::Create($input);
            $sucess['name'] =$customer->name;
            $response =[
                'sucess' => true,
                'data' => $customer,
                'message'=>'Customer Created Sucessfully' 
              ];
               return response()->json($response, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\newcustomers  $newcustomers
     * @return \Illuminate\Http\Response
     */
    public function show(newcustomers $newcustomers)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\newcustomers  $newcustomers
     * @return \Illuminate\Http\Response
     */
    public function edit(newcustomers $newcustomers)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\newcustomers  $newcustomers
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, newcustomers $newcustomers ,$id)
    {
        //
        $customer = newcustomers::find($id);

        if (!$customer) {
            return response()->json(['message' => 'Customer not found'], 404);
        }
        
        $validatedData = $request->all();
        $customer->fill($validatedData);
        $customer->save();
      
    
        // set other fields as needed
 

        return response()->json(['message' => 'Customer updated', 'customer' => $customer], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\newcustomers  $newcustomers
     * @return \Illuminate\Http\Response
     */
    public function destroy(newcustomers $newcustomers)
    {
        //
    }
  
}