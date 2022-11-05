<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Cart;
use Illuminate\support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth as FacadesAuth;

class UserController extends Controller
{
    public function login(){
        return view('front.login');

    }
    public function user_insert(Request $request){
        $user_count=User::where('email',$request->email)->count();
        if($user_count>0){
            return redirect()->back()->with('error','email is already exist');
        }else{
            $data =new User();
            // echo"<pre>";
            // print_r($user->all());
            $data->name=$request->name;
            $data->email=$request->email;
            $data->password=bcrypt($request->password);
            $data->save();
            if($data){
                return redirect('/login');
            }
        }
    }
    public function login_verification(Request $request){
        // $request->validate([
        //     'email' => 'required|email',
        //     'password' => 'required',
        // ]);
        // echo"<pre>";
        // print_r($request->all());
        $session_id=Session::getId();
        // echo $session_id;
        // die();
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            Cart::where('session_id',$session_id)->Update(['user_email'=>$request->email]);
            return redirect('/add_to_cart');
        }else{
            return redirect()->back();
        }
    }
    public function logout(){
        Auth::logout();
        return redirect('/');
    }
}
