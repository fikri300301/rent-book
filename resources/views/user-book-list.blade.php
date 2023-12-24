@extends('layouts.mainlayout')

@section('title','booklist')

@section('content')
<h1 class="text-center mt-2">Book-list</h1>

{{-- tombol serarching --}}
<div class="row">
  <div class="col-lg-4">
    <form action="" method="get">
      {{-- <div class="row"> --}}
       {{-- <div class="col-12 col-sm-3 mb-5"> --}}
          <div class="input-group mb-3">
              <input type="text" name="title" class="form-control" placeholder="search book title">
              <button type="submit" class="btn btn-primary">search</button>
            </div>
       {{-- </div> --}}
      {{-- </div> --}}
      </form>
  </div>

{{-- <div class="col-lg-4">
  <form action="" method="get">
    <div class="row"> 
    <div class="col-6 col-sm-6 mb-5">
      <select name="category" id="category" class="form-control">
        <option value="" disabled selected hidden>select category</option>
        @foreach ($categories as $category )
            <option value="{{ $category->id }}">{{ $category->name }}</option>
        @endforeach
      </select>
      <button type="submit" class=" btn btn-outline-secondary">search</button>
     </div> 
     </div>
  </form>
</div>   --}}

</div>




<div class="row">
    {{-- card style="width:304px; height:170px  --}}
    @foreach ($books as $book )
    <div class="col-lg-3 col-md-4 col-sm-6 mb-3">
        <div class="card" >
            <img src="{{ $book->cover != null ? asset('storage/cover/'.$book->cover) : asset('image/nocover.png') }}" class="card-img-top">
            <div class="card-body">
              <h5 class="card-title">{{ $book->book_code }}</h5>
              <p class="card-text">{{ $book->title }}</p>
            
              <p class="card-text text-end fw-bold {{ $book->status == 'in stock' ? 'text-success' : 'text-danger'  }}">
                {{ $book->status }}
              </p>
            </div>
        </div>
    </div>  
    @endforeach
</div>  
@endsection