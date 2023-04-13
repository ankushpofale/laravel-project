<?php

namespace App\Http\Controllers\API;
use Laravel\Sanctum\HasApiTokens;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Validator;
use App\Models\User;
use App\Models\customer;
use App\Models\newcustomers;
use Illuminate\Support\Facades\Artisan;
use Carbon\Carbon;
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

        $credentials = $request->only('email', 'password');
        
        if(Auth::attempt($credentials)){
            $user = Auth::user();
            $user->tokens()->where('name', 'authToken')->update(['revoked' => true]);
            $user->tokens()->delete();
            $user->last_login_time = Carbon::now();
            $user->save();
            $sucess['name'] =$user->name;
            $sucess['token'] = $user->createToken('myApp',['expiration' => 50])->plainTextToken;
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
            return response()->json($response, 401);
            
        }
    }
 
 
/*     public function migrate()
{
    Artisan::call('migrate');
    return response()->json(['message' => 'Migrations successfully run.']);
} */
}