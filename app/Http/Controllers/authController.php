<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Validator;
use Hash;
class authController extends Controller
{

   public function register(Request $request)
   {
    $validator=validator::make( $request->all(),[
        'name'=>'required',
        'email'=>'required|email',
        'password'=>'required|min:8'
    ]);
    if($validator->fails())
    {
        return response()->json([
            'status'=>'0',
            'message'=>'you must insert all information'

        ]);

    }
    /*$input = $request->all();
    $input['password'] = Hash::make($input['password']);
    $input['admin']=true;
*/

$data=[
    'name'=>$request->name,
    'email'=>$request->email,
    'password'=>$request->password,
    'admin'=>true,
];

    $warehouse = User::create([
        'name'=>$request->name,
        'email'=>$request->email,
        'password'=>$request->password,
        'admin'=>true,
    ]);

    $success['token'] = $warehouse->createToken('kareem')->accessToken;
    $success['name'] = $warehouse->name;
    return  response()->json([
        'status'=>'1',
        'message'=>'Registerd Succsesfully',
        'name'=>$success['name'],
       'token'=> $success['token'],
       'admin'=> $warehouse['admin'],

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
            'message'=>'login Succsesfully',
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
    

]);*/

    Session::flush();
  
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
