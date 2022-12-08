<div class="table-responsive">
    <!--begin::Table-->
    <table class="table align-middle gs-0 gy-4" id='testtable'>
        <!--begin::Table head-->
        <thead>
            <tr class="fw-bolder text-muted bg-light">
                <th class="ps-4 min-w- rounded-start">#</th>
                <th class="ps-4 min-w-100px rounded-start">Name</th>
                <th class="min-w-150px">Description</th>
                <th class="min-w-50px">Time(In Minutes)</th>
                <th class="min-w-50px">Number of Questions</th>

                <th class="min-w-100px "></th>
            </tr>
        </thead>
        <!--end::Table head-->
        <!--begin::Table body-->
        <tbody id='testappend'>
            @foreach($tests as $i => $test)
            <tr>
                <td>
                    {{++$i }}
                </td>
                <td>
                    {{$test->name}}
                </td>
                <td>
                    {{$test->description}}
                </td>
                <td>
                    {{$test->minutes}}
                </td>

                <td>
                    {{count($test->questions)}}
                </td>
                {{-- <td>
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
                                <a href="files.html" class="menu-link px-3">View</a>
                            </div>
                            <!--end::Menu item-->
                            <!--begin::Menu item-->
                            <div class="menu-item px-3">
                                <a href="#" class="menu-link px-3" data-kt-filemanager-table="rename">Rename</a>
                            </div>
                            <!--end::Menu item-->
                            <!--begin::Menu item-->
                            <div class="menu-item px-3">
                                <a href="#" class="menu-link px-3">Download Folder</a>
                            </div>
                            <!--end::Menu item-->
                            <!--begin::Menu item-->
                            <div class="menu-item px-3">
                                <a href="#" class="menu-link px-3" data-kt-filemanager-table-filter="move_row" data-bs-toggle="modal" data-bs-target="#kt_modal_move_to_folder">Move to folder</a>
                            </div>
                            <!--end::Menu item-->
                            <!--begin::Menu item-->
                            <div class="menu-item px-3">
                                <a href="#" class="menu-link text-danger px-3" data-kt-filemanager-table-filter="delete_row">Delete</a>
                            </div>
                            <!--end::Menu item-->
                        </div>
                        <!--end::Menu-->
                        <!--end::More-->
                    </div>
                </td> --}}
                <td data-field="Actions" data-autohide-disabled="false" aria-label="null" class="datatable-cell"><span
                        style="overflow: visible; position: relative; width: 125px;">
                       
                         <a href="{{route('test.edit',[$test->id])}}" class="btn btn-sm btn-clean btn-icon mr-2" title="Edit details">
                            <span class="svg-icon svg-icon-md"> <svg xmlns="http://www.w3.org/2000/svg"
                                    xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                    viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24"></rect>
                                        <path
                                            d="M8,17.9148182 L8,5.96685884 C8,5.56391781 8.16211443,5.17792052 8.44982609,4.89581508 L10.965708,2.42895648 C11.5426798,1.86322723 12.4640974,1.85620921 13.0496196,2.41308426 L15.5337377,4.77566479 C15.8314604,5.0588212 16,5.45170806 16,5.86258077 L16,17.9148182 C16,18.7432453 15.3284271,19.4148182 14.5,19.4148182 L9.5,19.4148182 C8.67157288,19.4148182 8,18.7432453 8,17.9148182 Z"
                                            fill="#000000" fill-rule="nonzero"
                                            transform="translate(12.000000, 10.707409) rotate(-135.000000) translate(-12.000000, -10.707409) ">
                                        </path>
                                        <rect fill="#000000" opacity="0.3" x="5" y="20" width="15" height="2" rx="1">
                                        </rect>
                                    </g>
                                </svg> </span> </a> 
                                <a id='delete_test' data-name='{{ $test->name }}' data-key='{{ $i }}' data-id='{{ $test->id }}' class="btn btn-sm btn-clean btn-icon"
                            title="Delete"> <span class="svg-icon svg-icon-md "> <svg xmlns="http://www.w3.org/2000/svg"
                                    xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                    viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24"></rect>
                                        <path
                                            d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z"
                                            fill="#000000" fill-rule="nonzero"></path>
                                        <path
                                            d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z"
                                            fill="#000000" opacity="0.3"></path>
                                    </g>
                                </svg> </span> 
                            </a>
                    </span>
                </td>
                <td>

                   
                    {{-- <a href="{{route('test.question',[$test->id])}}" class="btn btn-secondary btn-sm">
                        View
                    </a>
                    <a href="{{route('test.edit',[$test->id])}}" class="btn btn-info btn-sm">
                        <!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
                        Edit
                    </a>
                    <a id='delete_test' data-name='{{ $test->name }}' data-key='{{ $i }}' data-id='{{ $test->id }}'
                        class="btn btn-danger btn-sm">
                        <!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
                        Delete
                    </a> --}}


                </td>
            </tr>
            @endforeach
        </tbody>
        <!--end::Table body-->
    </table>

</div>