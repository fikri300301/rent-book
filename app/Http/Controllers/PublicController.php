<?php

namespace App\Http\Controllers;

use App\Models\book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PublicController extends Controller
{
    public function index(){
        $books = book::all();
        // $response = Http::get('http://127.0.0.1:8081/api/manage-kecamatan');
        // $data = $response->json();

        //  dd($data);
        return view('book-list',[
            'books' => $books,
           // 'data' => $data
        ]);
    }
}