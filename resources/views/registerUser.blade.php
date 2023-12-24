@extends('layouts.mainlayout')

@section('title','User')

@section('page-name','user')
    
    
@section('content')

<h1>Register user</h1>
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
            <th scope="col">action</th>
          </tr>
        </thead>
        <tbody>               
              @foreach ($users as $user)
           <tr>  
              <td>{{ $loop->iteration }}</td> 
              <td>{{ $user->username }}</td>
              <td>{{ $user->phone }}</td>
              <td>
                <a href="/detail-user/{{ $user->slug }}"><button class="btn btn-info">show</button></a>
                <a href="/user-approve/{{ $user->slug }}"><button class="btn btn-success">Approve</button></a>
              </td>
           </tr>
           @endforeach

           </th>
        </tbody>
  
</div>

@endsection