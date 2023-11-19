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
       // 'name'=>'required|',
        'email'=>'required|email',
        'password'=>'required|min:8'
    ]);
    if($validator->fails())
    {
        return "error";

    }
    $input = $request->all();
    $input['password'] = Hash::make($input['password']);
    $warehouse = User::create($input);
    $success['token'] = $warehouse->createToken('kareem')->accessToken;
    $success['name'] = $warehouse->name;
    return "sucees";
   }



   public function login(Request $request)
   {
    if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
        $warehouse = Auth::user();
        $success['token'] = $warehouse->createToken('kareem')->accessToken;
        $success['name'] = $warehouse->name;
        return "success";
    }

   else{
        return "error";
    }
   }




   public function logout()
   {
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
