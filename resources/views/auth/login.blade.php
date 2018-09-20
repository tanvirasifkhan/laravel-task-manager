@extends('auth.login_master')
@section('title','Login') 
@section('login')
<form class="card" action="index.html" method="post">
        <div class="card-body p-6">
          <div class="card-title text-uppercase text-center">Admin Login</div>
          <div class="form-group">
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
          </div>
          <div class="form-group">
            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
          </div>
          <div class="form-footer">
            <button type="submit" class="btn btn-primary btn-block">Sign in</button>
          </div>
        </div>
      </form>
@endsection