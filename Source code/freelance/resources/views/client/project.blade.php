@extends('client.sidebar')

@section('sidebar')

 
     <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
       <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
         <h1 class="h2">Projects</h1>
         <button type="submit" data-toggle="modal" class="btn mt-1  btn-success  "  data-target="#add-project"  ><i class="fas fa-plus-square"></i> Add Project </button>    
       </div>
       <div class="row ">
       @foreach( $myProjects as $project)
       <div class="card col-3 m-2" style="height: 350px;">
        <img src="/img/{!! $project->image !!}" class="card-img-top" style="height: 200px; " alt="...">
        <div class="card-body">
          <h5 class="card-title">{!! $project->name !!}<strong class="float-right">{!! $project->prix !!}/Dh</strong></h5>
          <p class="card-text">{!! $project->description !!}</p>
          <small >{!! $project->created_at !!} </small>
          <a class="btn ml-5 btn-success"  href="/client/projectD/{{$project->id}}">Details</a>
        </div>
      </div>
      @endforeach
    </div>
      
       
   {{-- add-project y--------------------}}
   <div class="modal fade" id="add-project" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title" id="staticBackdropLabel">Add Project</h3>
          <button type="button" class="close btn btn-light" data-dismiss="modal" aria-label="Close">
          <i class="fas fa-times"></i>
          </button>
        </div>
        <div class="modal-body">
          <form enctype="multipart/form-data" action="/client/addProject/" method="post">
             @csrf
             <div class="form-group">
                   <label>Name</label>
                   <input type="text" class="form-control" name="name" >
                </div>
                <div class="form-group">
                  <label>Image</label>
                  <input type="file" class="form-control" name="image" value="{{$LoggedUserInfo->image}}" >     
               </div>
                <div class="form-group">
                <label>Category</label>
                <select class="form-control" name="category" id="">
                  <option value=""></option>
                  <option value="Websites, IT & Software">Websites, IT & Software</option>
                  <option value="Design, Media & Architecture">Design, Media & Architecture</option>
                  <option value="Data Entry & Admin">Data Entry & Admin</option>
                  <option value="Translation & Languages ">Translation & Languages </option>
                  <option value="Writing & Content">Writing & Content</option>
                  <option value="Other ">Other </option>
                </select>
              </div>
              <div class="form-group">
                <label>Prix</label>
                <input type="number" class="form-control" name="prix" placeholder="00.0Dh" >
             </div>
                <div class="form-group">
                   <label>Description</label>
                   <textarea class="form-control" name="description" id="" cols="30" rows="5"></textarea>
                </div>

              
                <button type="submit" class="btn btn-block btn-success">Add</button>
             </form>   
         </div>
      </div>
    </div>
  </div>


 

     </main>
   </div>
 </div>
    @endsection