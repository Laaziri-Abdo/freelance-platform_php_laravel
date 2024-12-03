@extends('client.sidebar')

@section('sidebar')

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
   <div class="d-flex justify-content-end flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <div id="paypal-button-container"></div>   
    </div>
    <div class="m-2 ">
        <div class="row">
        <img src="/img/{!! $findProject->image !!}" style="height: 490px" class="col-md-6" alt="...">
          <form class="col-md-6" enctype="multipart/form-data" action="/client/editProject/{!! $findProject->id !!}" method="post">
             @csrf
             <div class="form-group">
      
                   <label>Name</label>
                   <input type="text" class="form-control" name="name" value="{!! $findProject->name !!}" >
                </div>
                <div class="form-group">
                    <label>Image</label>
                    <input type="file" class="form-control" name="image" value="{{$LoggedUserInfo->image}}" >     
                 </div>
                <div class="form-group">
                <label>Category</label>
                <select class="form-control" name="category" id="">
                    <option value="{!! $findProject->category !!}">{!! $findProject->category !!}</option>
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
                    <input type="number" class="form-control" name="prix" placeholder="00.0Dh" value="{!! $findProject->prix !!}" >
                 </div>
                <div class="form-group">
                   <label>Description</label>
                   <textarea class="form-control" name="description" cols="30" rows="5">{!! $findProject->description !!}</textarea>
                </div>
               <div class="form-group">
                <button type="submit" class="btn btn-success"><i class="fas fa-edit"></i>Update</button>
                <a  data-toggle="modal" class="btn mt-1  btn-danger float-right  " data-target="#deletproject"  ><i class="fas fa-trash"></i> Delete</a> 
            </div>
            </form>   
        </div>
      </div>
     @isset($findProject->freelanser_id)
     <form enctype="multipart/form-data"  action="/client/factures" method="POST">
        @csrf
        <input type="hidden" name="project_id" value='{{$findProject->id}}'>
        <input type="hidden" name="prix" value='{{$findProject->prix}}'>
        <input type="hidden" name="client_id" value='{{$findProject->client_id}}'>
        <input type="hidden" name="freelancer_id" value='{{$findProject->freelanser_id}}'>
        <button type="submit" class="btn m-5 btn-info">Factures</button>
        </form>
         
     @endisset
     <table class="table">
        <tr>
            
        
            <td>Project_id</td>
            <td>Feelancer_id</td>
            <td>Client_id</td>
            <td>Prix</td>
            <td>Date</td>
            <td></td>
            
            
        </tr>
        @foreach($findfacture as $facture)
        @if ( $facture->client_id == $LoggedUserInfo->id)
        <tr>
       
            <td>{{$facture->project_id}}</td>  
            <td>{{$facture->client_id}}</td>
            <td>{{$facture->freelanser_id}}</td>
            <td>{{$facture->prix}}</td>
            <td>{{$facture->created_at}}</td>

        </tr>

          @endif
        @endforeach
</table>
      

        {{-- payment -------------------------------------}}
    <script src="https://www.paypal.com/sdk/js?client-id=test&currency=USD&disable-funding=credit,card"></script>
    {{-- &disable-funding=credit,card --}}
    <script>
        // Render the PayPal button into #paypal-button-container
        paypal.Buttons({
            // Set up the transaction
            createOrder: function(data, actions) {
                return actions.order.create({
                    purchase_units: [{
                        amount: {
                            value: '{!! $findProject->prix !!}'
                        }
                    }]
                });
            },
            // Finalize the transaction
            onApprove: function(data, actions) {
                return actions.order.capture().then(function(orderData) {
                    // Successful capture! For demo purposes:
                    console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
                    var transaction = orderData.purchase_units[0].payments.captures[0];
                    alert('Transaction '+ transaction.status + ': ' + transaction.id + '\n\nSee console for all available details');

                });
            }
        }).render('#paypal-button-container');
    </script>
       
         
        {{-- ------------------------ --}}

    
        <div class="modal fade" id="deletproject" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
          <div class="modal-dialog">
             <div class="modal-content">
                <div class="modal-header">
                   <h3 class="modal-title" id="staticBackdropLabel">Are You Sure You Want To Delete This Project</h3>
                   <button type="button" class="close btn btn-light" data-dismiss="modal" aria-label="Close">
                   <i class="fas fa-times"></i>
                   </button>
                 </div>
                 <div class="modal-body ">     
          <a class="btn btn-outline-danger btn-block " href="/client/deleteProject/{{ $findProject->id}}">Yes</a>
          <button type="button" class=" btn btn-outline-info btn-block" data-dismiss="modal" aria-label="Close">
             No
               </button>
        </div> 
       </div>     
       </div>   
    </div>   
    </main>
 </div>
</div>
@endsection