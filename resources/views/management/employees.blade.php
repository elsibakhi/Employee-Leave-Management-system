<x-admin.master title="Employees" path="../../"> 
   
   
    <section class="content">
      
        <!-- Default box -->
        <div class="card">
          <x-header title="View employees" />
          <div class="card-body p-0  m-4">
            <table class="table table-striped projects">
                <thead>
                    <tr>
                        <th style="width: 1%">
                            #
                        </th>
                        <th style="width: 40%">
                             Name
                        </th>
                    
                        <th style="width: 40%">
                            Email
                        </th>
                        <th style="width: 18%">
                            
                        </th>
                    </tr>
                    </thead>
                    <tbody>
@forelse ($employees as $employee)
    

<tr>
    <td>
        #
    </td>
    <td>
      {{$employee->name}}
    </td>
    <td>
      {{$employee->email}}
    </td>

    <td class="project-actions text-right">
   
        <a class="btn btn-info btn-sm" href="{{route('register.edit',$employee->id)}}">
            <i class="fas fa-pencil-alt">
            </i>
            Edit
        </a>


         <x-form.delete :action="route('register.destroy',$employee->id)"  />
    </td>
</tr>


@empty
<tr>
    <td  colspan="3" >There is no Employees</td>
   </tr>
@endforelse


      
                </tbody>
            </table>

            {{$employees->links()}}
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
  
      </section>







</x-admin.master>