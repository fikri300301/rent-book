<?php

namespace App\Http\Controllers;

use App\Models\book;
use App\Models\Category;
use Illuminate\Http\Request;

class UserbooklistController extends Controller
{
    public function booklist(Request $request){
        
        $categories = Category::all();
//melakukan pencarian 
if($request->title){
    //mencari buku mennggunakan title dan categori
    $books = book::where('title','like','%'.$request->title.'%')->get();

    // 
 }
        
else{
    $books = book::all(); 
} 

if($request->category){
    $books = book::whereHas('categories',function($a) use($request){
                 $a->where('categories.id',$request->category);
            })->get(); 
}

else{
    $books = book::all(); 
} 

        

        
        return view('user-book-list',[
             'books' => $books,
             'categories' => $categories
        ]   
        ) ; 
    }
}

    //mencari buku menggunakan kategori dimana model table menggunakan many to many (sync)
    //menggunakan whereHas karena menggunakan many to many sehingga parameter di whereHas berasal dari relationship
    // dimodel book 
    // ;