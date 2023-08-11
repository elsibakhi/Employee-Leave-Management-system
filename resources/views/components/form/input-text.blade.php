@props(['name',"type"])


<x-form.input-container name={{$name}} >
    <input type='{{$type??"text"}}' name="{{$name}}"  @class(['form-control', 'is-invalid' => $errors->has($name)])  id="exampleInput{{$name}}" placeholder="Enter {{$name}}"  {{ $attributes }}  />
</x-form.input-container>