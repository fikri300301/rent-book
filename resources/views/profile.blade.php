@extends('layouts.mainlayout')

@section('title','Profile')

@section('content')
    <h2>Welcome-back {{ Auth::user()->username }}</h2>

    <div class="mt-5">
       <h4>your rent log</h4>
        <x-rent-log-table :rentlog='$rents' />
    </div>
   
@endsection