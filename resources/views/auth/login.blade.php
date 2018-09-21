@extends('auth.login_master')
@section('title','Login') 
@section('login')
<form class="card" action="{{route('auth.in')}}" method="post">
    @csrf
        <div class="card-body p-6">
          <div class="card-title text-uppercase text-center">Admin Login</div>
          @if(Session::has('message'))
             <p class="alert alert-danger">{{Session::get('message')}}</p>
          @endif
          <div class="form-group">
            <input type="email" class="form-control {{($errors->has('email'))?'is-invalid':''}}" name="email" value="{{old('email')}}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email address...">
            @if($errors->has('email'))
                <p class="text-danger">{{$errors->first('email')}}</p>
            @endif
          </div>
          <div class="form-group">
            <input type="password" class="form-control {{($errors->has('password'))?'is-invalid':''}}" name="password" value="{{old('password')}}" id="exampleInputPassword1" placeholder="Enter password...">
            @if($errors->has('password'))
                <p class="text-danger">{{$errors->first('password')}}</p>
            @endif
          </div>
          <div class="form-footer">
            <button type="submit" class="btn btn-primary btn-block">Sign in</button>
          </div>
        </div>
      </form>
@endsection