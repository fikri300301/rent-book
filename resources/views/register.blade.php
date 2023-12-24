<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Register</title>
    <style>
        .main {
            height: 100vh;
        }

        .register-box{
            width: 500px;
            border:solid 1px;
            padding: 30px
        }

        form div{
            margin-bottom: 15px;
        }
    </style>
  </head>
  <body>
   <div class="main d-flex flex-column justify-content-center align-items-center">
    @if ($errors->any())
    <div class="alert alert-danger width:500px">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if (session('status'))
<div class="alert alert-success width:500px">
    {{ session('message') }}
</div>
    
@endif
    <div class="register-box">
<form action="" method="post">
    @csrf
    <div>
        <label for="username" class="form-label">username</label>
        <input type="text" name="username" id="username" class="form-control" required>
    </div>

    <div>
        <label for="password" class="form-label">password</label>
        <input type="password" name="password" id="password" class="form-control" required>
    </div>

    <div>
        <label for="phone" class="form-label">phone</label>
        <input type="text" name="phone" id="phone" class="form-control" required>
    </div>

    <div>
        <label for="address" class="form-label">address</label>
       <textarea name="address" id="address" class="form-control" rows="4"></textarea>
    </div>

    <div>
        <button type="submit" class="btn btn-primary form-control" >Register</button>
    </div>

    <div class="text-center">
       you have account? <a href="login">Login</a>
    </div>

</form>
    </div>
   </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>