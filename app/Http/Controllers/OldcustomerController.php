<?php

namespace App\Http\Controllers;
use Auth;
use Validator;
use Illuminate\Http\Request;
use App\Models\Oldcustomer;
class OldcustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      
        if($request){

            $perPage = $request->has('perPage') ? $request->input('perPage') : 10;
          
            $query = Oldcustomer::query();
    
            if ($request->has('name')) {
                $query->where('name', 'LIKE', '%' . $request->input('name') . '%')
                ->orWhere('firstName', 'LIKE', '%' . $request->input('name') . '%')
                ->orWhere('lastName', 'LIKE', '%' . $request->input('name') . '%');
            }
    
            if ($request->has('phone')) {
                $query->where('phone', 'LIKE', '%' . $request->input('phone') . '%')
                ->orWhere('phone2', 'LIKE', '%' . $request->input('phone') . '%')
                ->orWhere('c_contact_number', 'LIKE', '%' . $request->input('phone') . '%')
                ->orWhere('c_Second_contact_number', 'LIKE', '%' . $request->input('phone') . '%');
            }

            if ($request->has('email')) {
                $query->where('email', $request->input('email'));
            }
            if ($request->has('suprimo')) {
                $query->where('c_supremo_Id', 'LIKE', '%' . $request->input('suprimo') . '%');
            }
            $users = $query->paginate($perPage);
          
            $pagination = [
                'total' =>  $users->total(),
                'per_page' =>  $users->perPage(),
                'current_page' => $users->currentPage(),
                'last_page' =>  $users->lastPage(),
            ];
            return response()->json([
                'data' =>  $users->items(),
                'pagination' => $pagination,
            ]);
           
        }
        
        
        $customer = Oldcustomer::get();
        return response()->json( $customer, 200);
      
    }
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}