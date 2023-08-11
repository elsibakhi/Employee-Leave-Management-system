@props(['name',"originName"])



  <div class="form-group">
    <label for="exampleInput{{$originName}}">{{ucfirst($name)}}</label>
    <select name="{{$originName}}" {{$attributes}} >

        {{$slot}}
    
    </select>
@error($originName)

<div class="invalid-feedback">{{$message}}</div>
@enderror
   
  </div>