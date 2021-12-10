<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;
use Hash;
use Session;
class CustomAuthController extends Controller
{
   public function login(){
       return view("auth.login");
   }
   public function registration(){
    return view("auth.registration");
    }
    public function registerUser(Request $request){
        $request->validate([
            'name'=>'required',
            'username'=>'required',
            'password'=>'required|min:5|max:12',
        ]);
        $users = new Users();
        $users->name = $request->name;
        $users->username = $request->username;
        $users->password = $request->password;
        $res = $users->save();
        if($res){
            return back()->with('Succes','You are Registered');
        }else{
            return back()->with('failed','Something Wrong');
        }
    }
    public function loginUser(Request $request)
    {
        $request->validate([

            'username'=>'required',
            'password'=>'required|min:5|max:12',
        ]);
        $user= Users::where('username','=',$request->username)->first();
        if ($user) {
            if (Hash::check($request->password, $user->password)) {
                $request->session()->put('loginId',$user->id);
                return redirect('dashboard');
            } else {
                return back()->with('failed','Password Not Match');

            }

        } else {
            return back()->with('failed','This User Name Is Not Registered');
        }

    }
    public function dashboard(){
        return "Welcome !! To you Dashboard";
    }
}
