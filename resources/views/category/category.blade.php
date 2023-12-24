@extends('layouts.mainlayout')

@section('title','Category')

@section('page-name','categort')
    
    
@section('content')

<h1>Category - list</h1>
  @if (session('status'))
  <div class="alert alert-success width:500px">
      {{ session('message') }}
  </div>
      
  @endif

 <a href="addcategory"><button class="btn btn-primary mt-4">Add new category</button></a>
 <a href="category-restore"><button class="btn btn-warning mt-4">file deleted</button></a>
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
        <?php 
        $a=1;    
        ?>
@foreach ($categories as $category)
<tr>
    <th>{{ $a++ }}</th>
   
    <td>{{ $category->name }}</td>
    <td>
        <a href="category-edit/{{ $category->slug }}"><button class="btn btn-primary"><i class="bi bi-pencil-square"></i></button></a>
      
        <a href="category-delete/{{ $category->slug }}"> <button class="btn btn-danger " onclick="return confirm ('are you sure to delete category {{ $category->name}}?')"><i class="bi bi-trash3-fill"></i></button></a>
      
    </td>
</tr> 
@endforeach
       
      
    </tbody>
  </table>
</div>

@endsection