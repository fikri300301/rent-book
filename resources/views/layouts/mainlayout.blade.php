<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Rental buku | @yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    {{-- <link rel="stylesheet" href="{{asset('css/style.css') }}"> --}}
    <link rel="stylesheet" href="/css/style.css">
  </head>
  <body>
    <div class="main d-flex flex-column justify-content-between">
      <nav class="navbar navbar-dark navbar-expand-lg bg-primary">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">MFP Rent-Book</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
        </div>
      </nav>
    
      <div class="body-content h-100">
        <div class="row g-0 h-100">
          <div class="sidebar col-lg-2 collapse d-lg-block" id="navbarSupportedContent">
           
            @if (Auth::user()->role_id == 1)
              <a href="/dashboard" @if (request()->route()->uri == 'dashboard')
                class="active"
              @endif >Dashboard</a>

              {{-- <a href="/categories" @if (request()->route()->uri == 'categories')
                class="active"  
              @endif>Category</a>

              <a href="/author"  @if (request()->route()->uri == 'author')
                class="active"  @endif>Author</a>

                <a href="/publisher"  @if (request()->route()->uri == 'publisher')
                  class="active"  @endif>publisher</a>

              <a href="/books" @if (request()->route()->uri == 'books')
                class="active" @endif >Book</a>

              <a href="/users" @if (request()->route()->uri == 'users')
                class="active"  @endif>User</a> --}}

              <a href="/rent"  @if (request()->route()->uri == 'rent')
                class="active"  @endif>Rent Log</a>

              <a href="/book-rent"  @if (request()->route()->uri == 'book-rent')
                class="active"  @endif>Book Rent</a>

              <a href="/book-return"  @if (request()->route()->uri == 'book-return')
                class="active"  @endif>Book Return</a>

              <a href="/logout">Log out</a>
            
            @else
            <a href="profile" @if (request()->route()->uri == 'profile')
              class="active"  @endif>profile</a>
            <a href="/user-book-list" @if (request()->route()->uri == 'user-book-list')
              class="active"  @endif>Book list</a>
            <a href="logout">Log out</a> 
            @endif
          
          </div>

          <div class="content p-4 col-lg-10">
            @yield('content')
          </div>
        </div>
      </div>
    </div>

   {{-- <div>
    @yield('content')
   </div> --}}
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>