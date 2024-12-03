@extends('freelancer.sidebar')

@section('sidebar')
 
     <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
       <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
         <h1 class="h2">Categorys</h1>
       </div>
 
       
       <h4>Websites, IT & Software</h4>
       <hr>
       <div class="row"> 
          
         @foreach( $projectArr as $project)
         @if($project->category =='Websites, IT & Software')
         <div class="card col-lg-2 col-sm-3  m-2" >
          <img src="/img/{!! $project->image !!}" class="card-img-top "style="height: 100px;" alt="...">
          <div class="my-2">
            <p class="card-title">{!! $project->name !!}<strong class="float-right">{!! $project->prix !!}/Dh</strong></p>
            <p class="card-text text-muted">{!! $project->description !!}</p>
            <small >{!! $project->created_at !!}</small>
          </div>
        </div>
        @endif
        @endforeach
     </div>
     <h4>Design, Media & Architecture</h4>
     <hr>
     <div class="row"> 
       
        @foreach( $projectArr as $project)
        @if($project->category == 'Design, Media & Architecture')
        <div class="card col-lg-2 col-sm-3  m-2" >
         <img src="/img/{!! $project->image !!}" class="card-img-top "style="height: 100px;" alt="...">
         <div class="my-2">
           <p class="card-title">{!! $project->name !!}<strong class="float-right">{!! $project->prix !!}/Dh</strong></p>
           <p class="card-text text-muted">{!! $project->description !!}</p>
           <small >{!! $project->created_at !!}</small>
         </div>
       </div>
       @endif
       @endforeach
     </div>
     <h4>Data Entry & Admin</h4>
     <hr>
     <div class="row"> 
        
        @foreach( $projectArr as $project)
       @if($project->category == 'Data Entry & Admin')
       <div class="card col-lg-2 col-sm-3  m-2" >
        <img src="/img/{!! $project->image !!}" class="card-img-top "style="height: 100px;" alt="...">
        <div class="my-2">
          <p class="card-title">{!! $project->name !!}<strong class="float-right">{!! $project->prix !!}/Dh</strong></p>
          <p class="card-text text-muted">{!! $project->description !!}</p>
          <small >{!! $project->created_at !!}</small>
        </div>
      </div>
      @endif
      @endforeach
     </div>
     <h4>Translation & Languages</h4>
     <hr>
     <div class="row"> 
        
        @foreach( $projectArr as $project)
      @if($project->category == 'Translation & Languages')
      <div class="card col-lg-2 col-sm-3  m-2" >
       <img src="/img/{!! $project->image !!}" class="card-img-top "style="height: 100px;" alt="...">
       <div class="my-2">
         <p class="card-title">{!! $project->name !!}<strong class="float-right">{!! $project->prix !!}/Dh</strong></p>
         <p class="card-text text-muted">{!! $project->description !!}</p>
         <small >{!! $project->created_at !!}</small>
       </div>
     </div>
     @endif
     @endforeach
 </div>
 <h4>Writing & Content</h4>
 <hr>
 <div class="row"> 
    
    @foreach( $projectArr as $project)
     @if($project->category == 'Writing & Content')
     <div class="card col-lg-2 col-sm-3  m-2" >
      <img src="/img/{!! $project->image !!}" class="card-img-top "style="height: 100px;" alt="...">
      <div class="my-2">
        <p class="card-title">{!! $project->name !!}<strong class="float-right">{!! $project->prix !!}/Dh</strong></p>
        <p class="card-text text-muted">{!! $project->description !!}</p>
        <small >{!! $project->created_at !!}</small>
      </div>
    </div>
    @endif
    @endforeach
 </div>
 <h4>Other</h4>
 <hr>
 <div class="row"> 
  
    @foreach( $projectArr as $project)
    @if($project->category == 'Other')
    <div class="card col-lg-2 col-sm-3  m-2" >
     <img src="/img/{!! $project->image !!}" class="card-img-top " style="height: 100px;" alt="...">
     <div class="my-2">
       <p class="card-title">{!! $project->name !!}<strong class="float-right">{!! $project->prix !!}/Dh</strong></p>
       <p class="card-text">{!! $project->description !!}</p>
       <small >{!! $project->created_at !!}</small>
     </div>
   </div>
   @endif
        @endforeach
      </div>
 
       
     </main>
   </div>
 </div>
 
    @endsection