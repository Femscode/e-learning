<div class="table-responsive">
    <!--begin::Table-->
    <table class="table align-middle gs-0 gy-4" id='accesstable'>
        <!--begin::Table head-->
        <thead>
            <tr class="fw-bolder text-muted bg-light">
                <th class="ps-4 min-w- rounded-start">#</th>
                <th class="ps-4 min-w-150px rounded-start">User</th>
                <th class="min-w-150px">Access</th>
                <th class="min-w-300px">Abilities</th>
                
                
                <th class="min-w-200px rounded-end"></th>
            </tr>
        </thead>
        <!--end::Table head-->
        <!--begin::Table body-->
        <tbody>
            @foreach($users as $key => $user)
          
            <tr>
                <td>{{ ++$key }}</td>
               
                <td>
                   {{$user->name}}
                </td>
                <td>
                    @if($user->isAdmin == 0) 
                    <div class='badge badge-secondary text-white'>User</div>
                    @elseif($user->isAdmin == 1)
                    <div class='badge badge-info'>Admin</div>
                    @else
                    <div class='badge badge-success'>Superadmin</div>
                    @endif
                    
                </td>
                <td>
                    @if($user->isAdmin == 0) 
                    <div class='badge badge-secondary text-white'>No access to the admin dashboard</div>
                    @elseif($user->isAdmin == 1)
                    {{-- <div class='badge badge-info'>Create, assign and delete test, create and delete questions, View users result, create and assign files and folders </div> --}}
                    <div class='badge badge-info' style='text-align:left'>Create, assign and delete test,<br> create and delete questions, <br> View users result,<br> create and assign files and folders </div>
                    @else
                    <div class='badge badge-success'>Overall access granted</div>
                    @endif
                    
                </td>
                
               
                <td>
                    <a id='delete_access' data-username='{{ $user->name }}' data-user='{{ $user->id }}'   class="btn btn-danger btn-sm">
                       Delete Access
                    </a>
                    <input type='hidden' value='{{ Auth::user()->id }}' id='userId'>
                </td>
            </tr>
            @endforeach
           
        </tbody>
        <!--end::Table body-->
    </table>
    <!--end::Table-->
</div>
{{-- {{ $tests->links()  }} --}}