<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function index(){
        return view('login');
    }

    public function authenticate(Request $request){
        //dd('ini halaman autehehtikasi');
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);
 
        if (Auth::attempt($credentials)) {
            if(Auth::user()->status != 'active'){
                Auth::logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();
                
                Session::flash('status', 'failed');
                Session::flash('message', 'your account is in active please call admin');
                return redirect('/login'); 
            }
          //  dd(Auth::user()->username);
           $request->session()->regenerate();

           if(Auth::user()->role_id == '1'){
                return redirect('dashboard');
           }
           
           if(Auth::user()->role_id == '2'){
                return redirect('profile');
           }
           
 
             //return redirect()->intended('/');
        }
        Session::flash('status', 'failed');
        Session::flash('message', 'your account is in active please call admin');
        return redirect('/login'); 
    }
    
    public function logout(Request $request){
      Auth::logout();
      $request->session()->invalidate();
      $request->session()->regenerateToken();
     
        return redirect('/');
    }
}