@extends('layouts.mainlayout')

@section('title','Add Author')

@section('page-name','add author')
    
    
@section('content')
  <h2>Add Author</h2>
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
    <form action="/author" method="post">
        @csrf
        <div>
            <label for="name" class="form-label">author name</label>
            <input type="text" name="name" id="name" class="form-control"  placeholder="author name" required>
        </div>
    
        <div>
            <button type="submit" class="btn btn-primary form-control mt-3" >save</button>
        </div>
    </form>
        </div>
       </div>
@endsection