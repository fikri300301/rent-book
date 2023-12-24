@extends('layouts.mainlayout')

@section('title','User-detail')

@section('page-name','user-detail')
    
    
@section('content')
<div class="my-3 w-25 ">

@if (session('status'))
<div class="alert alert-success width:500px">
    {{ session('message') }}
</div>
@endif
    <h2>Detail user</h2>
<a href="/users" ><button class="btn btn-primary">Back</button></a>
    <div class="mt-3">
        @if ($user->status == 'inactive')
        <a href="/user-approve/{{$user->slug}}"> <button class="btn btn-success">Aprove user</button> </a> 
        @endif
    </div>
    <div class="mt-4">
    <label for="username" class="form label">Username</label>
    <input type="text" class="form-control" readonly value="{{ $user->username }}">
    </div>

    <div class="mt-3">
        <label for="phone" class="form label">Phone</label>
        <input type="text" class="form-control" readonly value="{{ $user->phone }}">
     </div>

     <div class="mt-3">
        <label for="address" class="form label">address</label>
      <textarea name="address" id="adress" cols="30" rows="7" class="form-control" style="resize: none" readonly>{{ $user->address }}</textarea>
     </div>
    
     <div class="mt-3">
        <label for="status" class="form label">Starus</label>
        <input type="text" class="form-control" readonly value="{{ $user->status }}">
     </div>

</div>

<div class="mt-5">
    <h1>History Rent</h1>
    <x-rent-log-table :rentlog='$rents' />
</div>
@endsection