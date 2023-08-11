<x-admin.master title="Create type" path="../"> 
   
   
  <x-header title="Create type" />



          <x-form.layout method="post" :action="route('types.store')" btn-color="dark" btn-content="Create" >
            <x-form.input-text name="type"  />

          </x-form.layout>




                    <!-- general form elements -->




</x-admin.master>