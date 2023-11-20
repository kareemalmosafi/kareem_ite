<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Validator;
use Hash; 
use Session;
use Illuminate\Support\Facades\Auth;
class pharmacie_authController extends Controller
{
    public function register(Request $request)
    {
     $validator=validator::make( $request->all(),[
         'name'=>'required',
         'number'=>'required|unique',
         'password'=>'required|min:8'
     ]);
     if($validator->fails())
     {
         return response()->json([
             'status'=>'0',
             'message'=>'you must insert all information'
 
         ]);
 
     }
     $input = $request->all();
     $input['password'] = Hash::make($input['password']);
     $input['admin']=false;
     $warehouse = User::create($input);
     $success['token'] = $warehouse->createToken('kareem')->accessToken;
     $success['name'] = $warehouse->name;
     return  response()->json([
         'status'=>'1',
         'message'=>'Registerd Succsesfully',
         'name'=>$success['name'],
         'token'=> $success['token'],
 
     ]);
    }
 
 
 
    public function login(Request $request)
    {
     if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
         $warehouse = Auth::user();
         $success['token'] = $warehouse->createToken('kareem')->accessToken;
         $success['name'] = $warehouse->name;
 
         return  response()->json([
             'status'=>'1',
             'message'=>'Registerd Succsesfully',
             'name'=>$success['name'],
             'token'=> $success['token'],
     
         ]);
 
     }
 
    else{
         return response()->json([
             'status'=>'0',
             'message'=>'login failed'
 
         ]);
     }
    }
 
 
 
 
    public function logout()
    {
 /*
 auth::user()->currentAccessToken()->delete();
 
 return  response()->json([
     'status'=>'1',
     'message'=>'logout Succsesfully',
     
 
 ]);
 */
     Session::flush();
     Auth::logout();
     if(Auth::logout())
     {
     return response()->json([
         'error'=>'ssss'],201);
 }
 else
 {
     return response()->json([
         'error'=>'dddd'],401);
 }
    }
    
    }
 

