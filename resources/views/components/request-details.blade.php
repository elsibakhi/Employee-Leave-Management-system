<div >
    <p >Type
      <b class="d-block">{{$request->type->type}}</b>
    </p>
    <p >Duration
      <b class="d-block">{{$request->duration}}</b>
    </p>
    <p >Start date
      <b class="d-block">{{$request->start_dates}}</b>
    </p>
    <p >Description
      <b class="d-block">{{$request->description}}</b>
    </p>
  </div>

  <h5 class="mt-5 "> Request attachments</h5>
  <ul class="list-unstyled">
    @forelse ($files as $file)
    <li>
      <a href="{{$file->link}}" class="btn-link text-secondary"><i class="far fa-fw fa-file-word"></i>{{$file->name}}</a>
    </li>  
    @empty
        <b>There is no attachments</b>
    @endforelse 
 
        


  </ul>