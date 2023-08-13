<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Dashboard</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            {{-- <li class="breadcrumb-item"><a href="#">Home</a></li> --}}
            <li class="breadcrumb-item active">Dashboard</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>


<div class="container">


<div class="row">
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-info">
        <div class="inner">
          <h3>{{$statistics["request"]}}</h3>

          <p>Requests number</p>
        </div>
        <div class="icon">
          <i class="ion ion-bag"></i>
        </div>
       
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-success">
        <div class="inner">
          <h3>{{$statistics["approved"]}}</h3>

          <p>Approved requests number</p>
        </div>
        <div class="icon">
          <i class="ion ion-stats-bars"></i>
        </div>
      
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-warning">
        <div class="inner">
          <h3>{{$statistics["pending"]}}</h3>

          <p>Pending requests number</p>
        </div>
        <div class="icon">
          <i class="ion ion-person-add"></i>
        </div>
      
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-danger">
        <div class="inner">
          <h3>{{$statistics["rejected"]}}</h3>

          <p>Rejected requests number</p>
        </div>
        <div class="icon">
          <i class="ion ion-pie-graph"></i>
        </div>
  
      </div>
    </div>
    <!-- ./col -->
  </div>

</div>







<div class="card-body table-responsive p-4">
<table class="table table-striped table-valign-middle">
  <thead>
  <tr>
    <th>Empolyee name</th>
    <th>Duration</th>
    <th>Start date</th>
    <th>Type</th>
    <th>Description</th>
    <th>Status</th>
    <th>Opreations</th>
  </tr>
  </thead>
  <tbody>
@forelse ($requests as $request)

<tr>
<td>
 {{$request->empolyee->name}}
</td>
<td>{{$request->duration}}</td>
<td>{{$request->start_dates}}</td>
<td>
    {{$request->type->type}}
</td>
<td>
    {{$request->description??'Empty'}}
</td>


<td>
    <span @class(['badge', 
    
    'badge-success' => $request->status->value == "approved" ,
    'badge-warning' => $request->status->value =="pending" ,
    'badge-danger' => $request->status->value  == "rejected"
    
    
    ]) >{{$request->status}}</span>
</td>

<td>



     
      @if ( Auth::user()->role=="administrator")
      <a class="btn btn-info btn-sm"  href="{{route("management.edit",$request->id)}}">
        <i class="fas fa-pencil-alt">
        </i>
        Mange
    </a>

    <x-form.delete :action="route( 'management.destroy',$request->id)"  />
      @else
      <a class="btn btn-info btn-sm"   href="{{route( "requests.edit" ,$request->id)}}">
      <i class="fas fa-pencil-alt">
      </i>
      Edit
  </a>
      <a class="btn btn-dark btn-sm"   href="{{route( "requests.show" ,$request->id)}}">
      <i class="fas fa-eye">
      </i>
      Show status
  </a>

  <x-form.delete :action="route( 'requests.destroy',$request->id)"  />
      @endif
    
      
       
    
        
 




</td>
</tr>



@empty
   <tr>
    <td  colspan="6" >There is no Requests</td>
   </tr>
@endforelse




</tbody>
</table>
<div class="my-3 d-flex justify-content-center">

  {{$requests->links()}}
</div>
</div>


