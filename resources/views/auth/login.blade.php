<!DOCTYPE html>
<html>
<head>
    <title>Admin</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ URL::asset('assets/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ URL::asset('assets/fontawesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{ URL::asset('stylesheets/login.css')}}" rel="stylesheet">
    
</head>
<body class="login-page">
<div class="container-fluid" id="login">
    <div class="container">
        <div class="row">
            <h1 class="">Admin plane</h1>
            <form role="form" method="POST" action="{{ url('/login') }}" >
              <div class="form-group">
                <input type="email" name="email" class="form-control" placeholder="Email">
              </div>
              <div class="form-group">
                <input type="password" name="password" class="form-control"  placeholder="Password">
              </div>
               {!! csrf_field() !!}

              <button type="submit" class="btn btn-default">Sign In</button>
            </form>
        </div>
    </div>
</div>
</body>
</html>