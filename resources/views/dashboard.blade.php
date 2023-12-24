@extends('layouts.mainlayout')

@section('title','Dashboard')

{{-- @section('page-name','dashboard') --}}
    
    
@section('content')
    <h2>welcome {{ Auth::user()->username }}</h2>

    <div class="row mt-4">
        <div class="col-lg-4 ">
           <div class="card-data buku">
        <div class="row">
            <div class="col-6"><i class="bi bi-journal-bookmark-fill"></i></div>
            <div class="col-6 d-flex flex-column justify-content-center align-items-end">
              <a href="books" style="color:white"><div class="desc-book">Buku</div></a>  
                <div class="count-book">{{ $book_count }}</div>
            </div>
        </div>    
        </div> 
        </div>

        <div class="col-lg-4 ">
            <div class="card-data kategori">
         <div class="row">
             <div class="col-6"><i class="bi bi-tags-fill"></i></div>
             <div class="col-6 d-flex flex-column justify-content-center align-items-end">
                <a href="/categories" style="color:white"><div class="desc-book">Kategori</div></a> 
                 <div class="count-book">{{ $category_count }}</div>
             </div>
         </div>    
         </div> 
         </div>

         <div class="col-lg-4 ">
            <div class="card-data pengguna">
         <div class="row">
             <div class="col-6"><i class="bi bi-person-vcard"></i></div>
             <div class="col-6 d-flex flex-column justify-content-center align-items-end">
               <a href="/users" style="color:white"><div class="desc-book">Pengguna</div></a>  
                 <div class="count-book">{{ $user_count }}</div>
             </div>
         </div>    
         </div> 
         </div> 

         <div class="col-lg-4  mt-3">
            <div class="card-data penulis">
         <div class="row">
             <div class="col-6"><i class="bi bi-person-video2"></i></div>
             <div class="col-6 d-flex flex-column justify-content-center align-items-end">
                <a href="author" style="color:white"><div class="desc-book">Penulis</div></a> 
                 <div class="count-book">{{ $author_count }}</div>
             </div>
         </div>    
         </div> 
         </div> 

         <div class="col-lg-4 mt-3">
            <div class="card-data penerbit">
         <div class="row">
             <div class="col-6"><i class="bi bi-person-video2"></i></div>
             <div class="col-6 d-flex flex-column justify-content-center align-items-end">
                <a href="/publisher" style="color:white"><div class="desc-book">Penerbit</div></a> 
                 <div class="count-book">{{ $publisher}}</div>
             </div>
         </div>    
         </div> 
         </div>


    </div>

  
        <div class="mt-5">
            <x-rent-log-table :rentlog='$rents' />
        </div> 

@endsection