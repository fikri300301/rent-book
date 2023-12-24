@extends('layouts.mainlayout')

@section('title','Book')

@section('page-name','book')
    
    
@section('content')
   
   <h1>Book- list</h1>
   
   @if (session('status'))
   <div class="alert alert-success width:500px">
       {{ session('message') }}
   </div>   
   @endif
   
    <a href="/books/create"><button class="btn btn-primary mt-4">Add new book</button> </a>
   <div >
       <table class="table my-4">
       <thead>
         <tr>
           <th scope="col">no</th>
           <th scope="col">book code</th>
           <th scope="col">title</th>
           <th scope="col">categories</th>
           <th scope="col">author</th>
           <th scope="col">publisher</th>
           <th scope="col">status</th>
           <th scope="col">action</th>
         </tr>
       </thead>
       <tbody>
           <?php $a=1;   ?>
           @foreach ($books as $book)
       <tr>
       <th>{{ $a++ }}</th>
      
       <td>{{ $book->book_code }}</td>
       <td>{{ $book->title }}</td>
        <td>
        @foreach ($book->categories as $category)
            -{{ $category->name }} <br>
        @endforeach  
        </td> 
       <td>{{ $book->author->name}}</td>
       <td>{{ $book->publisher->name }}</td>
       <td>{{ $book->status }}</td>
       <td>
           <a href="/books/{{$book->slug}}/edit"><button class="btn btn-primary"><i class="bi bi-pencil-square"></i></button></a>
         
           <form action="books/{{$book->slug}}" method="post" class="d-inline">
               @method('delete')
               @csrf
   
               <button class="btn btn-danger " onclick="return confirm ('are you sure to delete {{ $book->title}}?')"><i class="bi bi-trash3-fill"></i></button>
           </form>
       </td>
       </tr> 
       @endforeach
       </tbody>
     </table>
   </div>
   
@endsection