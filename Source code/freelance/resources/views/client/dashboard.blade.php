@extends('client.sidebar')

@section('sidebar')
{{-- <style>
  .slider{
    max-width: 100%;
    position: relative;
    margin: auto;
    height: 300px;
}
/* Картинка масштабируется по отношению к родительскому элементу */
.slider .item img {
    object-fit: cover;
    width: 100%;
    height: 300px;
}
/* Кнопки вперед и назад */
.slider .previous, .slider .next {
    cursor: pointer;
    position: absolute;
    top: 50%;
    width: auto;
    margin-top: -22px;
    padding: 16px;
    color: rgb(8, 8, 8);
    font-weight: bold;
    font-size: 16px;
    transition: 0.6s ease;
    border-radius: 0 3px 3px 0;
}
.slider .next {
    right: 0;
    border-radius: 3px 0 0 3px;
}
/* При наведении на кнопки добавляем фон кнопок */
.slider .previous:hover,
.slider .next:hover {
    background-color: rgba(0, 0, 0, 0.2);
}
/* Анимация слайдов */
.slider .item {
    animation-name: fade;
    animation-duration: 1.5s;
}
@keyframes fade {
    from {
        opacity: 0.5
    }
    to {
        opacity: 1
    }
}
</style> --}}


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
      <h3>Freelancers</h3>
      <hr>
      <div class="row  w-100">
        @foreach( $freelancerArr as $freelancer)
        {{-- <a class="card col-lg-2 col-sm-3  m-2" href="/client/choose/{!! $freelancer->id !!}"> --}}
        <div class="card col-lg-2 col-sm-3  m-2"  >
         <img src="/img/{!! $freelancer->image !!}"style="height: 150px;" class="rounded-circle"  alt="...">
         <div class="my-2">
           <p class="text-center mt-1">{!! $freelancer->name !!}</p>
           <p class=" ">{!! $freelancer->email !!}</p>
           @foreach( $competanceArr as $competance)
           @if($competance->freelancer_id == $freelancer->id)
           <small><h6 class="text-center  border border-warning rounded-pill" > {!! $competance->name !!}</h6></small>
           @endif
           @endforeach
           <p class="card-text text-muted">{!! $freelancer->experience !!}</p>
         </div>
       </div>
      {{-- </a> --}}
       @endforeach
     </div>
      <h3>Projects</h3>
      <hr>
      
         <div class="slider row"> 
        @foreach( $projectArr as $project)
        <div class="card col-lg-2 col-sm-3 m-2 item "  >    
         <img class="w-100" src="/img/{!! $project->image !!}"style="height: 150px; "  alt="..."> 
         <div class="my-2">
           <p class="card-title ">{!! $project->name !!}<strong class="float-right">{!! $project->prix !!}/Dh</strong></p>
           <p class="card-text text-muted">{!! $project->description !!}</p>
           <small >{!! $project->created_at !!}</small>  
         </div>
       </div>
       @endforeach
     </div>
     <hr>
     </main>
   </div>
 </div>

    @endsection