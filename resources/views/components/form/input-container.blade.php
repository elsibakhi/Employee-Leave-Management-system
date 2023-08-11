<div class="form-group">
    <label for="exampleInput{{$name}}">{{ucfirst($name)}}</label>

    {{$slot}}
@error($name)

<div class="invalid-feedback">{{$message}}</div>
@enderror
   
  </div>