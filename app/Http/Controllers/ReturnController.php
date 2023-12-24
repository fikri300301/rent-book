<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\book;
use App\Models\User;
use App\Models\rent_log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class ReturnController extends Controller
{
    public function index(){
        $users = User::where('role_id',2)->where('status','active')->get();
        $books =book::all();
        
        return view('return-book.index',[
            'users' => $users,
            'books' => $books
        ]);
    }

    public function ReturnBook(Request $request){
        $rent = rent_log::where('user_id',$request->user_id)->where('book_id',$request->book_id)->where('actual_return_date',NULL);
        $rendata = $rent->first();
        $CountData = $rent->count();

        if($CountData == 1){
            
            $rendata->actual_return_date = Carbon::now()->toDateString();
            $rendata->save();

            $book = book::findOrFail($request->book_id);
            $book->status = 'in stock';
            $book->save();

            Session::flash('message','the book return successfuly');
            Session::flash('alert-class','alert-success');
            return redirect('book-return');
            
        }

        else{
            Session::flash('message','Data rent is not found');
            Session::flash('alert-class','alert-danger');
            return redirect('book-return');
        }
        
    }
    
}