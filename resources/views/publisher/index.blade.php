@extends('layouts.mainlayout')

@section('title','publisher')

@section('content')
    <h1>publisher - list</h1>
@if (session('status'))
<div class="alert alert-success width:500px">
    {{ session('message') }}
</div>
    
@endif

 <a href="/publisher/create"><button class="btn btn-primary mt-4">Add new publisher</button></a>

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
@foreach ($publisher as $publish)
<tr>
    <th>{{ $a++ }}</th>
   
    <td>{{ $publish->name }}</td>
    <td>
        <a href="/publisher/{{ $publish->slug }}/edit"><button class="btn btn-primary"><i class="bi bi-pencil-square"></i></button></a>
      
        <form action="publisher/{{$publish->slug}}" method="post" class="d-inline">
            @method('delete')
            @csrf

            <button class="btn btn-danger " onclick="return confirm ('are you sure to delete publisher {{ $publish->name}}?')"><i class="bi bi-trash3-fill"></i></button>
        </form>
      
    </td>
</tr> 
@endforeach
       
      
    </tbody>
  </table>
</div>

@endsection
