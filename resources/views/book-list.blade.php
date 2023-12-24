<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Rental buku | List-book</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{asset('css/style.css') }}">
  </head>
  <body>

<div class="main d-flex flex-column">
    <nav class="navbar navbar-dark navbar-expand-lg bg-primary">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">MFP Rent-Book</a>
      
       @if (Auth::user())
        <a class="navbar-brand" href="/dashboard">dashboard</a>
        @else
        <a class="navbar-brand" href="login"> login</a>
       @endif
       
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
       
      </div>
    </nav>
<div class="container">
    <h1 class="text-center mt-2">Book-list</h1>
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

    {{-- <div>
      <table class="table">
        <thead>
          <tr>
            <th scope="col">id</th>
            <th scope="col">Nama kecamatan</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($data['data'] as $dat )
            <tr>
              <td>{{ $loop->iteration}}</td>
              <td>{{ $dat['name_kecamatan'] }}</td>
            </tr>
          @endforeach
          
        </tbody>
      </table>
    </div> --}}
</div>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>