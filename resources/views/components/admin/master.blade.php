<x-main-layout title={{$title}} path="{{$path??''}}" >
  

    <x-slot:sidebar >
  <x-admin.sidebar />

    </x-slot>


  {{$slot}}

</x-main-layout>