<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class RegisterController extends Controller
{
    public function index(){
        return view('register');
    }

    public function store(Request $request){
       //dd($request->all());
       $validated = $request->validate([
        'username' => 'required|unique:users|max:255',
        'password' => 'required|max:255',
        'phone' =>'required|max:13',
        'address' =>'required',
    ]);
         //$validated['password'] = bcrypt($validated['password']);
        $request['password'] =Hash::make($request->password);
    
        //dd($request->all());

        $user = User::create($request->all());
        Session::flash('status', 'success');
        Session::flash('message', 'register success.Wait admin for approval');

        return redirect('register');
    }
}