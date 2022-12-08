
    <div class="table-responsive pr-20">
        <!--begin::Table-->
        <table class="table align-middle gs-0 gy-4 pr-20" id='questiontable'>
            <!--begin::Table head-->
            <thead>
                <tr class="fw-bolder text-muted bg-light">
                    <th class="ps-4 min-w- rounded-start">#</th>
                    <th class="min-w-250px">Question</th>
                    <th class="ps-4 min-w-250px rounded-start">Test</th>
                    <th class="min-w-250px">Date Created</th>
                    
                    <th class="min-w-100px text-end rounded-end"></th>
                </tr>
            </thead>
            <!--end::Table head-->
            <!--begin::Table body-->
            <tbody id='questionappend'>
@foreach($questions as $i => $test)
<tr>
    <td>
       {{++$i }}
    </td>
    <td>
       {{$test->question}}
    </td>
    <td>
        {{$test->testlink->name}}
    </td>
    <td>
        {{date('d-m-Y',strtotime($test->created_at))}}
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
                    <a href="{{route('question.show',[$test->id])}}" class="menu-link px-3">View</a>
                </div>
                <div class="menu-item px-3">
                    <a href="{{route('question.edit',[$test->id])}}" class="menu-link px-3">Edit</a>
                </div>
                <div class="menu-item px-3">
                    <a id='delete_question' data-key='{{ $i }}' data-name='{{ $test->question }}' data-id='{{ $test->id }}' class="menu-link text-danger px-3">Delete</a>
                </div>
                <!--end::Menu item-->
            </div>
            <!--end::Menu-->
            <!--end::More-->
        </div>
        
    </td>
    {{-- <td class="text-end">
        <a href="{{route('question.show',[$test->id])}}" class="btn btn-secondary btn-sm">
           View Questions
        </a>
        <a href="{{route('question.edit',[$test->id])}}" class="btn btn-info btn-sm">
            <!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
            Edit
        </a>
        <a id='delete_question' data-key='{{ $i }}' data-name='{{ $test->question }}' data-id='{{ $test->id }}' class="btn btn-danger btn-sm">
            <!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
            Delete
        </a>
      
    </td> --}}
</tr>
@endforeach
</tbody>
<!--end::Table body-->
</table>
<!--end::Table-->
</div>
{{-- {!! $questions->links() !!} --}}