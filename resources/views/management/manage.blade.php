<x-admin.master  title="Mange Request"  path="../../" >
    
    
    <x-header title="Mange Request" />
    
    
<div class="container p-4">
  
      <div class=" col-12 col-md-12 col-lg-4 order-1 order-md-2">
  
          <h3 class="text-primary">{{$request->empolyee->name}}</h3>
    
          <br>
  

<x-request-details :request="$request" :files="$files" />



<form action="{{route('management.update',$request->id)}}" method="post" >
  @csrf
  @method("put")

  <label >
     Status : <br>
    <div class="custom-control custom-radio">
    <input class="custom-control-input custom-control-input-success" type="radio" id="customRadio4" name="status" value="approved"   @checked($request->status=="approved")  >
    <label for="customRadio4" class="custom-control-label">Accept</label>
  </div>
  <div class="custom-control custom-radio">
    <input class="custom-control-input custom-control-input-danger " type="radio" id="customRadio5" name="status" value="rejected" @checked($request->status=="rejected")>
    <label for="customRadio5" class="custom-control-label">Reject</label>
  </div>

  </label>

<x-form.input-textarea   name="reason" >
{{old("reason")??$request->reason}}  
</x-form.input-textarea>

<button type="submit" class="btn btn-dark my-3">Manage</button>

</form>




</div>  


</x-admin.master>