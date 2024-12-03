@extends('client.sidebar')

@section('sidebar')

     <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
       <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
         <h1 class="h2">Postuler</h1>
       </div>
 
       <table class="table">
        <tr>
            
            <td>Project_id</td>
            <td>Project_name</td>
            <td>freelancer_id</td>
            <td>freelancer_name</td>
            <td>Date</td>
            <td></td>
            
            
        </tr>
        @foreach($Postulers as $Postuler)
        @if ( $Postuler->client_id == $LoggedUserInfo->id)
        <tr>
       
            <td>{{$Postuler->project_id}}</td>
            
            <td>{{$Postuler->project_name}}</td>
            <td>{{$Postuler->freelancer_id}}</td>
            <td>{{$Postuler->freelancer_name}}</td>
            <td>{{$Postuler->created_at}}</td>
          
            <td><a class="btn btn-danger" href="/deletePostuler/{{$Postuler->id}}">Delete</a>
              <a class="btn btn-success" href="/acceptPostuler/{{$Postuler->project_id}}/{{$Postuler->freelancer_id}}">Accept</a>


            </td>
        </tr>

          @endif
        @endforeach
</table>
 
     </main>
   </div>
 </div>
    @endsection