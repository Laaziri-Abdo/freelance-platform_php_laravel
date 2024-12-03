@extends('freelancer.sidebar')

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
         <h3>Email :<p class='m-4 text-muted'>{{$LoggedUserInfo->email }}</p></h3>
         <h3>Bio :<p class='m-4 text-muted'>{{$LoggedUserInfo->experience}}</p></h3>
        
     </div>
     </div>

     <div class="row">
        <div class="col-6">
           <h2 class="m-3 ">Skills</h2>
        
         @foreach($CompetanceArr as $Competance)
          @if( $Competance->freelancer_id == $LoggedUserInfo->id)
             <div class="alert alert-info pb-4 "> <strong>{!! $Competance->name !!} </strong><button type="submit" data-toggle="modal" class="btn mt-1  btn-outline-danger float-right  "  data-target="#delet"  ><i class="fas fa-trash"></i></button></div> 
             <div class="modal fade" id="delet" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
               <div class="modal-dialog">
                  <div class="modal-content">
                     <div class="modal-header">
                        <h3 class="modal-title" id="staticBackdropLabel">Are You Sure You Want To Delete This Competance</h3>
                        <button type="button" class="close btn btn-light" data-dismiss="modal" aria-label="Close">
                        <i class="fas fa-times"></i>
                        </button>
                      </div>
                      <div class="modal-body ">     
               <a class="btn btn-outline-danger btn-block " href="/freelancer/deleteCompetance/{!! $Competance->id !!}">Yes</a>
               <button type="button" class=" btn btn-outline-info btn-block" data-dismiss="modal" aria-label="Close">
                  No
                    </button>
             </div> 
            </div>     
            </div>   
         </div>   
          @endif
         @endforeach
        </div>


        {{-- Add Competance  ----------------------------}}
        <div class="col-6">
         <h2 class="m-3 ">Add Competance</h2>
         <form class="w-75 m-auto input-group "  action="/freelancer/createCompetance">
            <input class="form-control" type="text" name="name" placeholder="Enter to do list" class='form-control' required>
            <input type="submit" value="Add"  class="btn mb-4 btn-outline-dark">
    </form>
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
                  <form  enctype="multipart/form-data" action="/freelancer/update/{{$LoggedUserInfo->id }}" method="post">
                     @csrf
                     <div class="form-group">
                           <label>Name</label>
                           <input type="text" class="form-control" name="name" placeholder="Enter full name" value="{{$LoggedUserInfo->name}}">
                  
                        </div>
                        <div class="form-group">
                           <label class="form-label">Image</label>
                           <input type="file" class="form-control" name="image"  >     
                        </div>
                        <div class="form-group">
                           <label>Email</label>
                           <input type="text" class="form-control" name="email" placeholder="Enter email address" value="{{$LoggedUserInfo->email }}">
                      
                        </div>
                        <div class="form-group">
                           <label>Experience</label>
                           <input type="text" class="form-control" name="experience" value="{{$LoggedUserInfo->experience}}" placeholder="Enter your experience">
                     
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