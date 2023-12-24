@extends('layouts.mainlayout')

@section('title','Author')

@section('page-name','Author')
       
@section('content')
<h1>Author- list</h1>

@if (session('status'))
<div class="alert alert-success width:500px">
    {{ session('message') }}
</div>   
@endif

 <a href="/author/create"><button class="btn btn-primary mt-4">Add new  author</button> </a>
<div >
    <table class="table my-4">
    <thead>
      <tr>
        <th scope="col">no</th>
        <th scope="col">name</th>
        <th scope="col">action</th>
      </tr>
    </thead>
    <tbody>
        <?php $a=1;   ?>
        @foreach ($authors as $author)
    <tr>
    <th>{{ $a++ }}</th>
   
    <td>{{ $author->name }}</td>
    <td>
        <a href="/author/{{$author->slug}}/edit"><button class="btn btn-primary"><i class="bi bi-pencil-square"></i></button></a>
      
        <form action="author/{{$author->slug}}" method="post" class="d-inline">
            @method('delete')
            @csrf

            <button class="btn btn-danger " onclick="return confirm ('are you sure to delete author {{ $author->name}}?')"><i class="bi bi-trash3-fill"></i></button>
        </form>
    </td>
    </tr> 
    @endforeach
    </tbody>
  </table>
</div>

@endsection