<x-admin.master title="View types"> 
   
   
    <section class="content">
      
        <!-- Default box -->
        <div class="card">
          <x-header title="View types" />
          <div class="card-body p-0  m-4">
            <table class="table table-striped projects">
                <thead>
                    <tr>
                        <th style="width: 1%">
                            #
                        </th>
                        <th style="width: 40%">
                            Type Name
                        </th>
                    
                        <th style="width: 20%">
                        </th>
                    </tr>
                    </thead>
                    <tbody>
@forelse ($types as $type)
    

<tr>
    <td>
        #
    </td>
    <td>
      {{$type->type}}
    </td>

    <td class="project-actions text-right">
   
        <a class="btn btn-info btn-sm" href="{{route('types.edit',$type->id)}}">
            <i class="fas fa-pencil-alt">
            </i>
            Edit
        </a>


         <x-form.delete :action="route('types.destroy',$type->id)"  />
    </td>
</tr>


@empty
<tr>
    <td  colspan="3" >There is no Types</td>
   </tr>
@endforelse


      
                </tbody>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
  
      </section>







</x-admin.master>