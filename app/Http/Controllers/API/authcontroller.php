<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Validator;
use App\Models\User;
use App\Models\customer;
use App\Models\newcustomers;
use Illuminate\Support\Facades\Artisan;
class authcontroller extends Controller
{
    //
    public function register(Request $request){
        $validater = Validator::make($request->all(),[
            'name'=>'required',
            'email'=>'required|email',
            'password'=>'required'
           
        ]);
        if($validater->fails()){
            $response =[
                'sucess'=>false,
                'message'=>$validater->errors(),
            ];
            return response()->json($response, 400);
            }
             $input = $request->all();
             $input['password'] = bcrypt($input['password']);
             $user = User::Create($input);
             
             $sucess['token'] = $user->createToken('myApp')->plainTextToken;
             $sucess['name'] =$user->name;
             $response =[
               'sucess' => true,
               'data' => $sucess,
               'message'=>'User Register Sucessfully' ,
              
            
             ];
              return response()->json($response, 200);

    }
    public function login(Request $request){
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            $user = Auth::user();
            $sucess['name'] =$user->name;
            $sucess['token'] = $user->createToken('myApp')->plainTextToken;
            $sucess['name'] =$user->name;
            $response =[
              'sucess' => true,
              'data' => $sucess,
              'message'=>'User Login Sucessfully',
              
            ];
             return response()->json($response, 200);
   
        }else{
            $response =[
                'status'=>false,
                'message'=>'UnAuthorised User'
            ];
            return response()->json($response, 200);
            
        }
    }
 
 
/*     public function migrate()
{
    Artisan::call('migrate');
    return response()->json(['message' => 'Migrations successfully run.']);
} */
}