<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session; // Add this line for the Session class
use App\Models\User;

class CustomAuthController extends Controller
{
    public function login()
    {
        return view('frontend.signin');
    }
    public function register()
    {
        return view('frontend.signup');
    }
    public function registerUser(Request $request){
       $request->validate([
        'username'=>'required|unique:users|max:15',
        'name'=>'required',
        'email'=>'required|email|unique:users',
        'phone'=>'required|unique:users|max:10',
        'password'=>'required|min:5|max:12',
       ]);
       $user = new user();
       $user->username =$request->username;
       $user->name =$request->name;
       $user->email =$request->email;
       $user->phone =$request->phone;
       $user->password =Hash::make($request->password);
       $res =$user->save();
       if ($res){
          return back()->with('success', 'You have register sucessfully');
       } else{
        return back()->with('fail', 'Something wrong');

       }
    }
    public function loginUser(Request $request){
        $request->validate([
            'username'=>'required|max:15',
            'password'=>'required|min:5|max:12',
           ]);
           $user = user::where('username', '=', $request->username)->first();
           if($user){

            if(hash::check($request->password,$user->password)){
                $request->session()->put('loginid',$user->id);
                return redirect('profile');
            } else{
                return back()->with('fail', 'Password not Matches');

            }
           } else{
            return back()->with('fail', 'Username not found');
           }
    }
    public function profile(){
        $data = array();
        if (session::has('loginid')){
            $data = User::where("id", '=',session::get('loginid'))->first();
        }
        return view('frontend\profile',compact('data'));
    }
    public function logout(){
        if(session::has('loginid')){
            session::pull('loginid');
            return redirect('signin');
        }
    }
}
