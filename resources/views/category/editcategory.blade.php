@extends('layouts.mainlayout')

@section('title','edit category')

@section('page-name','edit category')
    
    
@section('content')
<h2>Edit Category</h2>
  @if ($errors->any())
  <div class="alert alert-danger w-50">
      <ul>
          @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
          @endforeach
      </ul>
  </div>
@endif
  
  <div class="mt-5 w-50">
    <form action="/category-edit/{{ $categories->slug }}" method="post">
        @csrf
        @method('put')
        <div>
            <label for="name" class="form-label">category name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $categories->name }}" placeholder="category name" required>
        </div>
    
        <div>
            <button type="submit" class="btn btn-success form-control mt-3" >update</button>
        </div>
    
       
    
    </form>
        </div>
       </div>
@endsection