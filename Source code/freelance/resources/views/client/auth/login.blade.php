@extends('layouts.app')

@section('content')
                  <a href="{{ url('client/login') }}"> <button class="btn btn-outline-success ml-4">Login</button></a>
                   <a href="{{ url('client/register') }}"> <button class="btn btn-outline-success ml-4">Sign Up</button></a>
                  </div>

            </div>
        </nav>
<div class="container ">
    <div class="col-lg-8 mx-auto " >
       <div class="card-body bg-light card-header mt-5 pb-4">
         <h1 class="text-center">login</h1>
         <hr />
            <form action="{{ route('client.check') }}" method="post">
             @if(Session::get('fail'))
                <div class="alert alert-danger">
                   {{ Session::get('fail') }}
                </div>
             @endif
   
            @csrf
               <div class="form-group">
                  <label>Email</label>
                  <input type="text" class="form-control" name="email" placeholder="Enter email address" value="{{ old('email') }}">
                  <span class="text-danger">@error('email'){{ $message }} @enderror</span>
               </div>
               <div class="form-group">
                  <label>Password</label>
                  <input type="password" class="form-control" name="password" placeholder="Enter password">
                  <span class="text-danger">@error('password'){{ $message }} @enderror</span>
               </div>
               <button type="submit" class="btn btn-block btn-success">Sign In</button>
               
               <br>
               <a href="{{ route('client.register') }}">Create Account</a>
            </form>
       </div>
    </div>
 </div>
 <div style="height: 220px;"></div>
@endsection
