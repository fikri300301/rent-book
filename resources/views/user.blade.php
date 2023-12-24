@extends('layouts.mainlayout')

@section('title','User')

@section('page-name','user')
    
    
@section('content')
   <h1>Halaman user</h1>
  
 @if(session('status'))
<div class="alert alert-success width:500px">
   {{ session('message') }}
</div>
 @endif
<div>

  <a href="registerUser"><button class="btn btn-primary">user register</button></a>
  <a href="user-restore"><button class="btn btn-info">User Banned</button></a>
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
                  <a href="/detail-user/{{ $user->slug }}"><button class="btn btn-success">show</button></a> 
                  
                  <a href="/user-delete/{{ $user->slug }}"><button class="btn btn-danger" onclick="return confirm ('are you sure to banned {{ $user->username}}?')">Banned User</button></a>
               </td>
            </tr>
            @endforeach

            </th>
         </tbody>
   
</div>

@endsection