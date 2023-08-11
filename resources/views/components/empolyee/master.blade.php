<x-main-layout title={{$title}}  path="{{$path??''}}" >
  

    <x-slot:sidebar >
  <x-empolyee.sidebar />

    </x-slot>


  {{$slot}}

</x-main-layout>