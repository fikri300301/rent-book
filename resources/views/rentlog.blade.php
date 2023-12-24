@extends('layouts.mainlayout')

@section('title','Rent-log')

@section('page-name','rent-log')
    
    
@section('content')
   <h1>ini halaman rent-log</h1>
 
<div class="mt-5">
<x-rent-log-table :rentlog='$rents' />
</div> 



@endsection