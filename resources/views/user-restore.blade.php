@extends('layouts.mainlayout')

@section('title','Restore User')

@section('content')

<h1>User Banned</h1>
  
@if(session('status'))
<div class="alert alert-success width:500px">
  {{ session('message') }}
</div>
@endif
<div>

 <a href="users"><button class="btn btn-primary">Back</button></a>

     <table class="table my-4">
        <thead>
          <tr>
            <th scope="col">no</th>
            <th scope="col">username</th>
            <th scope="col">phone</th>
            <th scope="col">status</th>
            <th scope="col">action</th>
          </tr>
        </thead>
        <tbody>               
              @foreach ($users as $user)
           <tr>  
              <td>{{ $loop->iteration }}</td> 
              <td>{{ $user->username }}</td>
              <td>{{ $user->phone }}</td>
              <td>{{ $user->status }}</td>
              <td>
                 <a href="/user-restore/{{ $user->slug }}"><button class="btn btn-success" onclick="return confirm ('are you sure to Activate {{ $user->username}}?')">Actived User</button></a>
              </td>
           </tr>
           @endforeach

           </th>
        </tbody>
  
</div>

@endsection