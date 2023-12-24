<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class CategoryController extends Controller
{
    public function index(){
        return view('category.category',[
            'categories' => Category::all()
        ]);
    }
    
    public function addcategory(){
        return view('category.addcategory');
    }

    public function store(Request $request){
        //dd($request->all());
        $validated = $request->validate([
        'name' => 'required|unique:categories|max:50',
    ]);
    Session::flash('status', 'success');
    Session::flash('message', 'succes add new category');
        $categories = Category::create($request->all());
        return redirect('categories');
    }

    public function edit($slug){
        return view('category.editcategory',[
            'categories' => Category::where('slug',$slug)->first()
        ]);
    }

    public function update(Request $request ,$slug){
        //dd($request->all());

        $validated = $request->validate([
            'name' => 'required|unique:categories|max:50',
        ]);

        $category = Category::where('slug', $slug)->first();
        $category->slug = null;
        $category->update($request->all());

         Session::flash('status', 'success');
         Session::flash('message', 'update category succsessfully');
        return redirect('categories');  
    }

    public function destroy($slug){
        $category = Category::where('slug', $slug)->first();
        $category->delete();
        Session::flash('status', 'success');
        Session::flash('message', 'delete category succsessfully');
        return redirect('categories');
    }

    public function restore(){
        return view('category.CategoryRestore',[
            'restore' => Category::onlyTrashed()->get() 
        ]);
    }

    public function restorecategory($slug){
        $category = Category::withTrashed()->where('slug', $slug)->first();
        $category->restore();
        Session::flash('status', 'success');
        Session::flash('message', 'restore category succsessfully');
        return redirect('categories');
    }
}