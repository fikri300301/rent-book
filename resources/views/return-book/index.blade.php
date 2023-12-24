@extends('layouts.mainlayout')

@section('title','Return Book')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<div class="col-12 col-md-8 offset-md-2 col-lg-6 offset-md-3">
<h2>Form Renturn Book</h2>

@if (session('message'))
<div class="alert {{ Session('alert-class') }}">
    {{ session('message') }}
</div>
    
@endif
    <form action="book-return" method="post">

        @csrf
        <label for="user" class="form-label">User</label>
        <select name="user_id" id="" class="form-control input-box">
            <option value="">select user</option>
            @foreach ($users as $user )
                <option value="{{ $user->id }}">{{ $user->username }}</option>
            @endforeach
        </select>

        <label for="book" class="form-label">book</label>
        <select name="book_id" class="form-control input-box">
            <option value="" disabled selected hidden>select book</option>
            @foreach ($books as $book )
                <option value="{{ $book->id }}">
                        {{ $book->title }} - {{ $book->book_code }}
                </option>
            @endforeach
        </select>

        <div>
            <button type="submit" class="btn btn-primary w-100 mt-4">submit</button>
        </div>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
    $('.input-box').select2();
});
</script>
@endsection