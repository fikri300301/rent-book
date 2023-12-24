<?php

namespace App\Http\Controllers;

use App\Models\book;
use App\Models\User;
use App\Models\author;
use App\Models\Category;
use App\Models\publisher;
use App\Models\rent_log;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){

        $book_count = book::count();
        $category_count = Category::count();
        $user_count = User::count();
        $author_count = author::count();
        $publisher = publisher::count();
        $rents = rent_log::all();
       
        return view('dashboard',[
            'book_count' => $book_count,
            'category_count' => $category_count,
            'user_count' => $user_count,
            'author_count' => $author_count,
            'publisher' => $publisher,
            'rents' => $rents,
        ]);
    }
}