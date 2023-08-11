@props(['name'])

<x-form.input-container name='{{$name}}' >
            
    <textarea  style="display: block" name="{{$name}}" id="{{$name}}" cols="60" rows="10" {{$attributes}} >{{$slot}}</textarea>
  </x-form.input-container>