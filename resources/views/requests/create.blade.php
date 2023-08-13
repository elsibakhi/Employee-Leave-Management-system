<x-empolyee.master title="Create request" path="../"> 
   
   


            <x-header title="Create request" />



          <x-form.layout method="post" :action="route('requests.store')" btn-color="dark" btn-content="Create" enctype="multipart/form-data" >
           <x-form.input-text type="number" name="duration" />
           <x-form.input-text type="date" name="start_date" />
           <x-form.input-textarea  name="description" placeholder="Do you want to say something extra? Write it down" />
           <x-form.input-select  name="leave type" origin-name="leaveType_id">
             @foreach ($types as $type)
             <option value="{{$type->id}}">{{$type->type}}</option>
             
             @endforeach
            </x-form.input-select>
            
            
            <x-form.input-text type="file" name="attachments[]" multiple="multiple" />













          </x-form.layout>




                    <!-- general form elements -->




</x-empolyee.master>