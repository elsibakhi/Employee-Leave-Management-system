<x-empolyee.master title="Show request" path="../"> 
   
   


            <x-header title="Show request" />

<div class="container">

  <x-request-details :request="$request" :files="$files" />

  <p >Status
    <b @class(['d-block', 'text-success' => $request->status=="approved", 'text-danger' => $request->status=="rejected", 'text-warning' => $request->status=="pending"])>{{$request->status}}</b>
  </p>

  <p >Reason
    <b class="d-block">{{$request->reason??"There is no reason"}}</b>
  </p>


</div>


</x-empolyee.master>