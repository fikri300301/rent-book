<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\book;
use App\Models\rent_log;
use App\Models\User;

use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class BookRentController extends Controller
{
    public function index(){
        $users = User::where('status','active')->where('role_id',2)->get(); 
        $books = book::all(); 
        return view('book-rent',[
            'users' => $users,
            'books' => $books
        ]);
    }

    public function store(Request $request){
        $request['rent_date'] = Carbon::now()->toDateString();
        $request['renturn_date'] = Carbon::now()->addDay(3)->toDateString();
      
        $book = book::findOrFail($request->book_id)->only('status');
       
      
        if($book['status'] != 'in stock'){
           Session::flash('message','the book is alredy');
           Session::flash('alert-class','alert-danger');
           return redirect('book-rent');
        }
        
        else{
            
            $rent = rent_log::where('user_id',$request->user_id)->where('actual_return_date',NULL)->count();
            
            if($rent >= 3){
           Session::flash('message','cannot rent book');
           Session::flash('alert-class','alert-danger');
           return redirect('book-rent');
            }
            
            try {
                DB::beginTransaction();
                //proses insrt to rent_table
                rent_log::create($request->all());
                
                //proses update book table
                $book = book::findOrFail($request->book_id);
                $book->status ='not availale';
                $book->save();
                DB::commit();
                Session::flash('message','rent book success');
                Session::flash('alert-class','alert-success');
                return redirect('book-rent');
            } catch (\Throwable $e) {
                DB::rollBack();
            
            } 
            
        }

        
    }
}