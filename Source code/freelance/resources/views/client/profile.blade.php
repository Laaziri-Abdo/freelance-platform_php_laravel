@extends('client.sidebar')
@section('sidebar')
<main class="col-md-9 ms-sm-auto  col-lg-10 px-md-4">
   <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
     <h1 class="h2">Profile</h1>
     <button type="submit" data-toggle="modal" class="btn mt-1  btn-success  "  data-target="#update-modal"  >Update Profile <i class="fas fa-user"></i></button>     
   </div>
   @if(Session::get('success'))
   <div class="alert alert-success">
      {{ Session::get('success') }}
   </div>
 @endif
 <div class="row">
 <img class=" col-5  m-auto" src="/img/{{$LoggedUserInfo->image}}" alt="hello">
 <div class="col m-4">
    <h3>Name :<p class='m-4 text-muted'>{{$LoggedUserInfo->name}}</p></h3>
    <h3>Email :  <p class='m-4 text-muted'>{{$LoggedUserInfo->email }}</p></h3>
    <h3>Type :<p class='m-4 text-muted'>{{$LoggedUserInfo->type}}</p></h3>
    <h3>Category :<p class='m-4 text-muted' >{{$LoggedUserInfo->category}}</p></h3> 
</div>
</div>

  
  



  {{-- update profile y--------------------}}
     <div class="modal fade" id="update-modal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h3 class="modal-title" id="staticBackdropLabel">Update Profile</h3>
              <button type="button" class="close btn btn-light" data-dismiss="modal" aria-label="Close">
              <i class="fas fa-times"></i>
              </button>
            </div>
            <div class="modal-body">
              <form enctype="multipart/form-data" action="/client/update/{{$LoggedUserInfo->id }}" method="post">
                 @csrf
                 <div class="form-group">
                       <label>Name</label>
                       <input type="text" class="form-control" name="name"  value="{{$LoggedUserInfo->name}}">
                    </div>
                    <div class="form-group">
                       <label>Email</label>
                       <input type="text" class="form-control" name="email" value="{{$LoggedUserInfo->email }}">
                    </div>
                    <div class="form-group">
                       <label>Type</label>
                       <input type="text" class="form-control" name="type" value="{{$LoggedUserInfo->type}}" >     
                    </div>
                    <div class="form-group">
                     <label>Category</label>
                     <input type="text" class="form-control" name="category" value="{{$LoggedUserInfo->category}}" >     
                  </div>
                  <div class="form-group">
                     <label>Image</label>
                     <input type="file" class="form-control" name="image" value="{{$LoggedUserInfo->image}}" >     
                  </div>
                    <button type="submit" class="btn btn-block btn-success">Update</button>
                 </form>   
             </div>
          </div>
        </div>
      </div>
 
 </main>
   </div>
 </div>
    @endsection