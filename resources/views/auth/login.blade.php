<!doctype html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Language" content="en" />
    <meta name="msapplication-TileColor" content="#2d89ef">
    <meta name="theme-color" content="#4188c9">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent"/>
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="HandheldFriendly" content="True">
    <meta name="MobileOptimized" content="320">
    <link rel="icon" href="{{asset('uploads/project.png')}}" type="image/x-icon"/>
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('uploads/project.png')}}" />
    <!-- Generated: 2018-04-16 09:29:05 +0200 -->
    <title>Login-Task Management System</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,300i,400,400i,500,500i,600,600i,700,700i&amp;subset=latin-ext">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <!-- Dashboard Core -->
    <link href="{{asset('css/dashboard.css')}}" rel="stylesheet" />
    <script src="{{asset('js/dashboard.js')}}"></script>
    <script type="text/javascript">
      $(document).ready( function () {
        $('#example').DataTable();
      });
    </script>
  </head>
  <body class="" style="background: #673AB7;">
    <div class="page">
      <div class="page-single">
        <div class="container">
          <div class="row">
            <div class="col col-login mx-auto">
                <img class="img-responsive mx-auto d-flex mb-5" src="{{asset('uploads/login_logo.png')}}">
                <form class="card" action="{{route('auth.authenticate')}}" method="POST">
                @csrf
                    <div class="card-body p-6">
                      <div class="card-title text-uppercase text-center">Task Managment System</div>
                      @if(Session::has('success_message'))
                          <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>{{Session::get('success_message')}}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            </button>
                          </div>
                      @elseif(Session::has('message'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                          <strong>{{Session::get('message')}}</strong>
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          </button>
                        </div>
                      @endif
                      <div class="form-group">
                        <input type="email" class="form-control {{($errors->has('email'))?'is-invalid':''}}" name="email" value="{{old('email')}}" placeholder="Enter email address...">
                        @if($errors->has('email'))
                            <p class="text-danger">{{$errors->first('email')}}</p>
                        @endif
                      </div>
                      <div class="form-group">
                        <input type="password" class="form-control {{($errors->has('password'))?'is-invalid':''}}" name="password" value="{{old('password')}}" placeholder="Enter password...">
                        @if($errors->has('password'))
                            <p class="text-danger">{{$errors->first('password')}}</p>
                        @endif
                      </div>
                      <div class="form-footer">
                        <button type="submit" class="btn btn-info btn-block">Sign in</button>
                      </div>
                    </div>
                  </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>