<?php

namespace App\Http\Controllers;

use App\Models\author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('author.author',[
            'authors' => author::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('author.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated=$request->validate([
            'name' => 'required|unique:authors|max:50',
        ]);
        Session::flash('status', 'success');
        Session::flash('message', 'succes add new category');
            $author = author::create($request->all());
            return redirect('author');
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
        return view('author.edit', [
            'authors' => author::where('slug',$slug)->first()
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
        $validated=$request->validate([
            'name' => 'required|unique:authors|max:50',
        ]);
        
        $author = author::where('slug', $slug)->first();
        $author->slug = null;
        $author->update($request->all());

         Session::flash('status', 'success');
         Session::flash('message', 'update category succsessfully');
        return redirect('author');  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $author = author::where('slug', $slug)->first();
        $author->delete();
        Session::flash('status', 'success');
        Session::flash('message', 'delete category succsessfully');
        return redirect('author');
    }
}