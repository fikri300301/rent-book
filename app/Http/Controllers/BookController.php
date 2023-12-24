<?php

namespace App\Http\Controllers;

use App\Models\book;
use App\Models\author;
use App\Models\Category;
use App\Models\publisher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('book.books',[
            'books' => book::all(),author::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('book.create',[
            'authors' => author::all(),
            'publishers' => publisher::all(),
            'categories' => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       //dd($request->all());
        
    $validated = $request->validate([
        'book_code' => 'required|unique:books|max:255',
        'title' => 'required',
        'cover' =>'file|max:1024',
        'author_id' => 'max:255',
        'publisher_id' =>'max:255'
        
    ]);

    //menamai file foto
        $newName ='';
    if($request->file('image')) {
            $extension = $request->file('image')->getClientOriginalExtension();
            $newName = $request->title.'-'.now()->timestamp.'.'.$extension;
            $request->file('image')->storeAs('cover', $newName);

        }
    
    $request['cover'] = $newName;    
    
        $book=book::create($request->all());
        $book->categories()->sync($request->categories);
        Session::flash('status', 'success');
        Session::flash('message', 'succes add new book');
        return redirect('books');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $book = book::where('slug', $slug)->first();
        $categories = Category::all();
        return view('book.edit',[
            'book' => $book,
            'authors' =>author::all(),
            'publishers' => publisher::all(),
            'categories' => $categories
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        $validated = $request->validate([
            'book_code' => 'required|max:255',
            'title' => 'required',
            'cover' =>'file|max:1024',
            'author_id' => 'max:255',
            'publisher_id' =>'max:255'
            
        ]);

    //menamai file foto
        if($request->file('image')) {
                $extension = $request->file('image')->getClientOriginalExtension();
                $newName = $request->title.'-'.now()->timestamp.'.'.$extension;
                $request->file('image')->storeAs('cover', $newName);
                $request['cover'] = $newName;
            }
        
        
        $book = book::where('slug', $slug)->first();
        $book->update($request->all());

        if($request->categories){
            $book->categories()->sync($request->categories);
        }
        Session::flash('status', 'success');
        Session::flash('message', 'succes update book');
        return redirect('books');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $book = book::where('slug', $slug)->first();
        $book->delete();
        Session::flash('status', 'success');
        Session::flash('message', 'succes update book');
        return redirect('books');

    }
}