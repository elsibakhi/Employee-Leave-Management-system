<x-empolyee.master title="Edit Request" path="../../"> 
   
   
  <x-header title="Edit Request" />



          <x-form.layout method="put" :action="route('requests.update',$request->id)" btn-color="dark" btn-content="update" enctype="multipart/form-data" >
            <x-form.input-text type="number" name="duration" value="{{old('duration')??$request->duration}}" />
              <x-form.input-text type="date" name="start_date" value="{{old('start_date')??$request->start_dates}}" />
            <x-form.input-textarea  name="description" placeholder="Do you want to say something extra? Write it down"  >
              {{old('description')??$request->description}}
            </x-form.input-textarea>
            <x-form.input-select  name="leave type" origin-name="leaveType_id">
             @foreach ($types as $type)

             <option value="{{$type->id}}" @selected($request->leaveType_id==$type->id) >{{$type->type}}</option>
                 
             @endforeach
            </x-form.input-select>
   
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

            <label >
              Actions : <br>
             <div class="custom-control custom-radio">
             <input class="custom-control-input custom-control-input-danger" type="radio" id="customRadio4" name="action" value="delete"     >
             <label for="customRadio4" class="custom-control-label">Delete previous attachments</label>
           </div>
           <div class="custom-control custom-radio">
             <input class="custom-control-input custom-control-input-warning " type="radio" id="customRadio5" name="action" value="replace" >
             <label for="customRadio5" class="custom-control-label">Replace previous attachments with new ones</label>
           </div>
           <div class="custom-control custom-radio">
             <input class="custom-control-input custom-control-input-info " type="radio" id="customRadio6" name="action" value="add">
             <label for="customRadio6" class="custom-control-label">Add to previous attachments the new attachments</label>
           </div>
         
           </label>
 

           <x-form.input-text type="file" name="attachments[]" multiple="multiple" />

           </x-form.layout>




      


                    <!-- general form elements -->




</x-empolyee.master>