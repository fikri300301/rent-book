<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\rent_log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ProfileController extends Controller
{
    public function index(){
       // $request->session()->flush();
//mengecek user yang login 
//dd(Auth::user()->id);

$rents = rent_log::where('user_id',Auth::user()->id)->get();
                return view('profile',[
                        'rents' => $rents
                ]     
);
    }
public function user(){

        $user = User::where('status', 'active')->where('role_id',2)->get();
        return view('user',[
            'users' => $user
        ]);
}

public function registerUser(){
        $user = User::where('status', 'inactive')->get();
        return view('registerUser',[
            'users' => $user
        ]);
}

public function show($slug){
        $user = User::where('slug', $slug)->first();
        $rents = rent_log::where('user_id',$user->id)->get();
       // dd($rents);
        return view('user-detail',[
            'user' => $user,
            'rents' => $rents
        ]);
}

public function approve($slug){
        $user = User::where('slug', $slug)->first();
        $user->status = 'active';
        $user->save();
        Session::flash('status', 'success');
        Session::flash('message', 'user is actived');
        return redirect('detail-user/'.$slug);
}

public function destroy($slug){
        $user = User::where('slug', $slug)->first();
        $user->delete();
        Session::flash('status', 'success');
        Session::flash('message', 'delete category succsessfully');
        return redirect('users');
}

public function restore(){
        $user = User::onlyTrashed()->get();
        return view('user-restore',[
            'users' => $user
        ]);
}

public function userrestore($slug)
{
        $user = User::withTrashed()->where('slug', $slug)->first();
        $user->restore();

        Session::flash('status', 'success');
        Session::flash('message', 'User is Actived');
        return redirect('users');
        
}

}