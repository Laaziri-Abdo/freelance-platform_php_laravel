@extends('layouts.app')

@section('content')
<a href="{{ url('freelancer/login') }}"> <button class="btn btn-outline-success ml-4">Login</button></a>
<a href="{{ url('freelancer/register') }}"> <button class="btn btn-outline-success ml-4">Sign Up</button></a>
</div>

</div>
</nav>
<div class="container">
   <div class="col-lg-8 mx-auto " >
      <div class="card-body bg-light card-header mt-5 pb-4">
        <h1 class="text-center">Sign Up</h1>
        <hr />
            <form action="{{ route('freelancer.save') }}" method="post">

 
            @if(Session::get('fail'))
              <div class="alert alert-danger">
                 {{ Session::get('fail') }}
              </div>
            @endif
 
            @csrf
            <div class="form-group">
                  <label>Name</label>
                  <input type="text" class="form-control" name="name" placeholder="Enter full name" value="{{ old('name') }}">
                  <span class="text-danger">@error('name'){{ $message }} @enderror</span>
               </div>
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
               <button type="submit" class="btn btn-block btn-success">Sign Up</button>
               <br>
               <a href="{{ route('freelancer.login') }}">I already have an account, sign in</a>
            </form>
       </div>
    </div>
 </div>
 <div style="height: 140px;"></div>   
@endsection
