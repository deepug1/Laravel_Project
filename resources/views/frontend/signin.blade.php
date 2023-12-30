@extends('frontend.pages.main')
@section('main')
       <center><h1>Welcome to Lab Test Hub</h1></center>

<div class="account-page">
     <div class="container">
        <div class="row">
               <div class="col-2">
                    <div class="form-conatainer">
                        <div class="form-btn">
                            <h1>Login<h1>
                        </div>

                        <form action="{{route('login-user')}}" method="post">
                            @if (Session::has('success'))
                            <div class="alert alert-sucess">{{Session::get('success')}}</div>
                            @endif
                            @if (Session::has('fail'))
                            <div class="alert alert-danger">{{Session::get('fail')}}</div>
                            @endif
                            @csrf
                            <div class="form-group">
                              <label for="username">Username</label>
                              <input type="text" class="form-control" placeholder="Username" name="username" size="40" value="">
                              <span class="text-danger">@error('username') {{$message}} @enderror</span>
                            </div>

                              <div class="form-group">
                                <label for="username">Password</label>
                                <input type="password" class="form-control" placeholder="Enter Password" name="password" value="">
                                <span class="text-danger">@error('password') {{$message}} @enderror</span>
                              </div>
                              <div class="form-group">
                                <button class="btn btn-block btn-primry" type="submit">Login</button>
                              </div>
                              <a href="{{ url('signup') }}">New User !! Click Here</a>
                        </form>
                </div>
             </div>
        </div>
     </div>
</div>
@endsection
