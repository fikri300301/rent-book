@extends('layouts.mainlayout')

@section('title','create book')

@section('content')

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <h2>Create-Book</h2>

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
    <form action="/books" method="post" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="book_code" class="form-label">book code</label>
            <input type="text" name="book_code" id="book_code" class="form-control"  placeholder="book code" value="{{ old('book_code') }}" required>
        </div>

        <div class="mt-3">
            <label for="title" class="form-label">title</label>
            <input type="text" name="title" id="title" class="form-control"  placeholder="title" required value="{{ old('title') }}">
        </div>

        <div class="mt-3">
         
            <label for="image" class="form-label">image</label>
            <input type="file" name="image" id="image" class="form-control"  placeholder="cover" >
        </div>
         
        <div class="mt-3">
            <label for="author_id" class="form-label">author</label>
            <select name="author_id" id="author" class="form-select" value="{{ old('author_id') }}" >
                @foreach ($authors as $author)
                @if(old('author_id') == $author->id)
                
                <option value="{{ $author->id }}" selected>{{ $author->name }}</option>
                @else
                <option value="{{ $author->id }}">{{ $author->name }}</option>
                @endif
                @endforeach
            </select>
        </div>

        <div class="mt-3">
            <label for="publisher" class="form-label">publisher</label>
            <select name="publisher_id" id="publisher" class="form-select">

                @foreach ($publishers as $publisher)
                    <option value="{{ $publisher->id }}">{{ $publisher->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mt-3">
            <label for="Category" class="form-label">Category</label>
            <select name="categories[]" id="categories" class="form-control select-multiple" multiple>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

    
        <div>
            <button type="submit" class="btn btn-primary form-control mt-3" >save</button>
        </div>
    </form>
    </div>
    </div>
<script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
  
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
     $(document).ready(function() {
        $('.select-multiple').select2();
    });
</script>
   
@endsection