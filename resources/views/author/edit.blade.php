@extends('layouts.mainlayout')

@section('title','Profile')

@section('content')
    <h4>Edit author</h4>

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
    <form action="/author/{{ $authors->slug }}" method="post">
        @method('put')
        @csrf
        <div>
            <label for="name" class="form-label">author name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $authors ->name }}" placeholder="author name" required>
        </div>
    
        <div>
            <button type="submit" class="btn btn-primary form-control mt-3" >save</button>
        </div>
    
       
    
    </form>
        </div>
       </div>
@endsection