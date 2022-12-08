<div class="table-responsive">
    <!--begin::Table-->
    <table class="table align-middle gs-0 gy-4" id='assigntable'>
        <!--begin::Table head-->
        <thead>
            <tr class="fw-bolder text-muted bg-light">
                {{-- <th class="ps-4 min-w- rounded-start">#</th> --}}
                <th class="ps-4 min-w-300px rounded-start">User</th>
                <th class="min-w-450px">Test</th>
                
                
                <th class="min-w-100px text-end rounded-end"></th>
            </tr>
        </thead>
        <!--end::Table head-->
        <!--begin::Table body-->
        <tbody>
            @foreach($tests as $test)
            @foreach($test->users as $key=>$user)
            <tr>
                
               
                <td>
                   {{$user->name}}
                </td>
                <td>
                    {{$test->name}}
                </td>
                <td data-field="Actions" data-autohide-disabled="false" aria-label="null" class="datatable-cell"><span
                    style="overflow: visible; position: relative; width: 125px;">
                    <div class="ms-2">
                        <button type="button" class="btn btn-sm btn-icon btn-light btn-active-light-primary me-2" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                            <!--begin::Svg Icon | path: icons/duotune/general/gen052.svg-->
                            <span class="svg-icon svg-icon-5 m-0">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <rect x="10" y="10" width="4" height="4" rx="2" fill="black"></rect>
                                    <rect x="17" y="10" width="4" height="4" rx="2" fill="black"></rect>
                                    <rect x="3" y="10" width="4" height="4" rx="2" fill="black"></rect>
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                        </button>
                        <!--begin::Menu-->
                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-150px py-4" data-kt-menu="true" style="">
                            <!--begin::Menu item-->
                            <div class="menu-item px-3">
                                <a href="{{route('test.question',[$test->id])}}" class="menu-link px-3">View Question</a>
                            </div>
                            <div class="menu-item px-3">
                                <a href="/result/user/{{$user->id}}/quiz/{{$test->id}}" class="menu-link px-3">View Result</a>
                            </div>
                            <div class="menu-item px-3">
                                <a id='delete_assign' data-test='{{ $test->name }}' data-username='{{ $user->name }}' data-user='{{ $user->id }}' data-id='{{ $test->id }}' class="menu-link text-danger px-3">Delete Assign</a>
                            </div>
                            <!--end::Menu item-->
                        </div>
                        <!--end::Menu-->
                        <!--end::More-->
                    </div>
                    
                </td>
               
                {{-- <td class="text-end">
                    <a href="{{route('test.question',[$test->id])}}" class="btn btn-secondary btn-sm">
                       View Questions
                    </a>
                    <a href="/result/user/{{$user->id}}/quiz/{{$test->id}}" class="btn btn-success btn-sm">
                       View Result
                    </a>
                    <a id='delete_assign' data-test='{{ $test->name }}' data-username='{{ $user->name }}' data-user='{{ $user->id }}' data-id='{{ $test->id }}'  class="btn btn-danger btn-sm">
                       Delete Assign
                    </a>
                    <input type='hidden' value='{{ Auth::user()->id }}' id='userId'>
                </td> --}}
            </tr>
            @endforeach
            {{-- {{ $test->users->links()  }} --}}
            @endforeach
        </tbody>
        <!--end::Table body-->
    </table>
    <!--end::Table-->
</div>
{{-- {{ $tests->links()  }} --}}