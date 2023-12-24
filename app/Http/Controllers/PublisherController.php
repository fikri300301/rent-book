<?php

namespace App\Http\Controllers;

use App\Models\author;
use App\Models\publisher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PublisherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('publisher.index',[
            'publisher' => publisher::all()
        ]);

       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('publisher.create');
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
            'name' => 'required|unique:publisher|max:50',
        ]);
        Session::flash('status', 'success');
        Session::flash('message', 'succes add new category');
            $author = publisher::create($request->all());
            return redirect('publisher');
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
        return view('publisher.edit', [
            'publisher' => publisher::where('slug',$slug)->first()
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
            'name' => 'required|unique:publisher|max:50',
        ]);
        
        $publisher = publisher::where('slug', $slug)->first();
        $publisher->slug = null;
        $publisher->update($request->all());

         Session::flash('status', 'success');
         Session::flash('message', 'update category succsessfully');
        return redirect('publisher');  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $publisher = publisher::where('slug', $slug)->first();
        $publisher->delete();
        Session::flash('status', 'success');
        Session::flash('message', 'delete category succsessfully');
        return redirect('publisher');
    }
}