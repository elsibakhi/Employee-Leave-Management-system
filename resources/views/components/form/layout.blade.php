@props(['method',"action","btnColor","btnContent"])

<div class="card card-dark m-4">
    <div class="card-header">
      <h3 class="card-title">Create Form</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form action="{{$action}}"  {{$attributes}}  method="{{
    $method=="put"||$method=="patch"||$method=="delete" ? 'post'
    : $method
    
    }}">
@if ($method != "get")
    @csrf
  @if ($method != "post")
      @method($method)
  @endif

@endif

      <div class="card-body">

        {{$slot}}
   

        </div>
        
        <div class="card-footer ">
            <button type="submit" class="btn btn-{{$btnColor}} ">{{$btnContent}}</button>
         
           
        </div>
    
      <!-- /.card-body -->

    </form>
  </div>