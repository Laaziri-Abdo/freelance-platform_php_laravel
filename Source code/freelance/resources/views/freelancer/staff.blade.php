@extends('freelancer.sidebar')

@section('sidebar')
 
     <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
       <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
         <h1 class="h2">Projects</h1>
         
       </div>
      
        @foreach( $myProjects as $project)
        @if( $project->freelanser_id == $LoggedUserInfo->id)
        <div class="row ">
         <img src="/img/{!! $project->image !!}" class="col-6" style="height: 250px; " alt="...">
         <div class="col-6">
           <h2 class="card-title">{!! $project->name !!}<strong class="float-right">{!! $project->prix !!}/Dh</strong></h2>
           <h3 class="card-text">{!! $project->description !!}</h3>
           <h4 >{!! $project->created_at !!} </h4>

         </div>
        </div>
        <hr>
     @endif
       @endforeach
    
       
 
     </main>
   </div>
 </div>
 
    @endsection