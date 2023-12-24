@extends('layouts.mainlayout')

@section('title','Category-restore')

@section('page-name','category-restore')
    
    
@section('content')

<h1>Category - list</h1>
@if (session('status'))
<div class="alert alert-success width:500px">
    {{ session('message') }}
</div>
    
@endif

    <table class="table my-4">
    <thead>
      <tr>
        <th scope="col">no</th>
      
        <th scope="col">name</th>
        <th scope="col">restore</th>
      </tr>
    </thead>
    <tbody>
        <?php 
        $a=1;    
        ?>
@foreach ($restore as $rest)
<tr>
    <th>{{ $a++ }}</th>
   
    <td>{{ $rest->name }}</td>
    <td>
    <a href="category-restore/{{ $rest->slug }}"> <button class="btn btn-success" onclick="return confirm ('are you sure to restore category?')"><i class="bi bi-arrow-bar-up"></i></button></a> 
    </td>
</tr> 
@endforeach
       
      
    </tbody>
  </table>
</div>

@endsection