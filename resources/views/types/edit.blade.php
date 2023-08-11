<x-admin.master title="Edit type" path="../../"> 
   
   


       
          <x-header title="Edit {{$type->type}} type" />


          <x-form.layout method="put" :action="route('types.update',$type->id)" btn-color="dark" btn-content="update" >
            <x-form.input-text name="type" value="{{old('type')??$type->type}}" />

          </x-form.layout>




                    <!-- general form elements -->




</x-admin.master>