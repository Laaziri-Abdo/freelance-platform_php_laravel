@extends('freelancer.sidebar')

@section('sidebar')

 
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Dashboard</h1>   
  </div>
  <div class="row text-center ">
    <h1 class="col alert alert-primary py-4 m-2"><strong class="text-primary ">+{{ $countfreelancers }}</strong> Freelancers</h1>
    <h1 class="col alert alert-danger py-4 m-2"><strong class="text-danger ">+{{ $countclients }}</strong> Clients</h1>
    <h1 class="col alert alert-success py-4 m-2"><strong class="text-success ">+{{ $countprojects }}</strong> Projects</h1>
</div>
<hr>
  <h3>Clients</h3>
  <hr>
  <div class="row w-100">
    @foreach( $clientArr as $client)
    <div class="card col-lg-2 col-sm-3  m-2"  >
     <img src="/img/{!! $client->image !!}"style="height: 150px;" class="rounded-circle"  alt="...">
     <div class="my-2">
       <p class="card-title ">{!! $client->name !!}</p>
       <p class="card-title ">{!! $client->email !!}</p>
       <p class="card-text text-muted">{!! $client->type !!}</p>
     </div>
   </div>
   @endforeach
 </div>
  <h3>Projects</h3>
  <hr>
  <div class="row slider w-100" >
    @foreach( $projectArr as $project)
    <div class="card col-lg-2 col-sm-3  m-2"  >
     <img class="w-100" src="/img/{!! $project->image !!}"style="height: 150px; "  alt="...">
     <div class="my-2">
       <p class="card-title ">{!! $project->name !!}<strong class="float-right">{!! $project->prix !!}/Dh</strong></p>
       <p class="card-text text-muted">{!! $project->description !!}</p>
       <small >{!! $project->created_at !!}</small>
       
       <form enctype="multipart/form-data" action="/postuler" method="POST">
        @csrf
        <input type="hidden" name="project_id" value='{{$project->id}}'>
        <input type="hidden" name="project_name" value='{{$project->name}}'>
        <input type="hidden" name="client_id" value='{{$project->client_id}}'>
        <input type="hidden" name="freelancer_id" value='{{$LoggedUserInfo->id}}'>
        <input type="hidden" name="freelancer_name" value='{{$LoggedUserInfo->name}}'>
        <button type="submit" class="btn btn-success">  Postuler</button>
        </form> 
     </div>
   </div>
   @endforeach
 </div>
 <hr>
 </main>
</div>
</div>
  
    @endsection