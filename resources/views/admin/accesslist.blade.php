@extends('admin.adminmaster')
@section('header')
<h5>Access Control</h5>
@stop
@section('subheader')
@if (count($errors) > 0)
<div class="alert alert-danger">
    <strong>Whoops!</strong> There were some problems with your input.
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

@if (Session::has('message'))
<div class="alert alert-success">
    <strong>{{Session::get('message')}}</strong>

</div>
@endif
@stop
@section('content')
<h2>Access Control</h2>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
    Assign Access
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Assign Access</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form" action="{{route('access_control')}}" method="POST">@csrf
                    <!--begin::Modal header-->
                   
                    <!--begin::Modal body-->
                    <div class="modal-body py-10 px-lg-17">
                        <!--begin::Scroll-->
                        <div class="scroll-y me-n7 pe-7" id="kt_modal_new_address_scroll" data-kt-scroll="true"
                            data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto"
                            data-kt-scroll-dependencies="#kt_modal_new_address_header"
                            data-kt-scroll-wrappers="#kt_modal_new_address_scroll" data-kt-scroll-offset="300px">
                            <!--begin::Notice-->
                           
                            <div class="d-flex flex-column mb-5 fv-row">
                                <!--begin::Label-->
                                <label class="required fs-5 fw-bold mb-2">User</label>
                                <!--end::Label-->
                                <select name="user_id[]" multiple="" aria-label="Select User" data-control="select2"
                                    data-placeholder="Select User..."
                                    class="form-select mb-2 select2-hidden-accessible"
                                    data-select2-id="select2-data-10-t0j9" tabindex="-1" aria-hidden="true">
                                    {{-- <select name='user_id' multiple required
                                        class="form-control form-control-solid" placeholder=""> --}}
                                        <option value=''>Select User</option>
                                        @foreach($users as $user)
                                        <option class='form-control' value='{{$user->id}}'>{{$user->name}}</option>
                                        @endforeach
                                    </select>
                            </div>

                            <div class="d-flex flex-column mb-5 fv-row">
                                <!--begin::Label-->
                                <label class="required fs-5 fw-bold mb-2">Access</label>
                                <select name='access_type' required class="form-control"
                                    placeholder="">


                                    <option value=''>Select Access</option>
                                    <option value='user'>User</option>
                                    <option value='admin'>Admin</option>
                                    <option value='super_admin'>Super Admin</option>
                                </select>
                                <!--end::Input-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->

                        </div>
                        <!--end::Scroll-->
                    </div>
                    <!--end::Modal body-->
                    <!--begin::Modal footer-->
                    <div class="modal-footer flex-center">
                        <!--begin::Button-->
                        <button type="reset" id="kt_modal_new_address_cancel"
                            class="btn btn-light me-3">Discard</button>
                        <!--end::Button-->
                        <!--begin::Button-->
                        <button type="submit" id="kt_modal_new_address_submit" class="btn btn-primary">
                            <span class="indicator-label">Assign</span>
                                </button>
                        <!--end::Button-->
                    </div>
                    <!--end::Modal footer-->
                </form>

            </div>

        </div>
    </div>
</div>
<div class="nk-block nk-block-lg">

    <div class="card card-preview">
        <div class="card-inner">
            <table class="datatable-init nk-tb-list nk-tb-ulist" data-auto-responsive="false">
                <thead>
                    <tr class="nk-tb-item nk-tb-head">
                        <th class="nk-tb-col nk-tb-col-check">
                            <div class="custom-control custom-control-sm custom-checkbox notext">
                                <input type="checkbox" class="custom-control-input" id="file-check-n6">
                                <label class="custom-control-label" for="file-check-n6"></label>
                            </div>
                        </th>
                        <th class="nk-tb-col"><span class="sub-text">User</span></th>
                        <th class="nk-tb-col"><span class="sub-text">Access</span></th>
                        <th class="nk-tb-col tb-col-mb"><span class="sub-text">Ability</span></th>

                        <th class="nk-tb-col tb-col-md"><span class="sub-text">Status</span></th>
                        <th class="nk-tb-col nk-tb-col-tools text-right">
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $key => $user)
                    <tr class="nk-tb-item">
                        <td class="nk-tb-col nk-tb-col-check">
                            <div class="custom-control custom-control-sm custom-checkbox notext">
                                <input type="checkbox" class="custom-control-input" id="file-check-n6">
                                <label class="custom-control-label" for="file-check-n6"></label>
                            </div>
                        </td>
                        <td class="nk-tb-col">
                            <div class="user-card">
                                <div class="user-avatar bg-dim-primary d-none d-sm-flex">
                                    <span>{{ substr($user->first_name,0,1) }}.{{ substr($user->last_name,0,1)}}</span>
                                </div>
                                <div class="user-info">
                                    <span class="tb-lead">{{ $user->name }} <span
                                            class="dot dot-success d-md-none ml-1"></span></span>
                                    <span>{{ $user->email }}</span>
                                </div>
                            </div>
                        </td>
                        <td class="nk-tb-col tb-col-lg">

                            @if($user->isAdmin == 0)
                            <div class='badge badge-secondary text-white'>User</div>
                            @elseif($user->isAdmin == 1)
                            <div class='badge badge-info'>Admin</div>
                            @else
                            <div class='badge badge-success'>Superadmin</div>
                            @endif

                        </td>
                        <td class="nk-tb-col tb-col-lg">
                            @if($user->isAdmin == 0)
                            <div class='badge badge-secondary text-white'>No access to the admin dashboard</div>
                            @elseif($user->isAdmin == 1)
                            {{-- <div class='badge badge-info'>Create, assign and delete test, create and delete
                                questions, View users result, create and assign files and folders </div> --}}
                            <div class='badge badge-info' style='text-align:left'>Create, assign and delete test,<br>
                                create and delete questions, <br> View users result,<br> create and assign files and
                                folders </div>
                            @else
                            <div class='badge badge-success'>Overall access granted</div>
                            @endif

                        </td>

                        <td class="nk-tb-col nk-tb-col-tools">
                            <ul class="nk-tb-actions gx-1">

                                <li>
                                    <div class="drodown">
                                        <a href="#" class="dropdown-toggle btn btn-icon btn-trigger"
                                            data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <ul class="link-list-opt no-bdr">

                                                <li><a id='delete_access' data-username='{{ $user->name }}'
                                                        data-user='{{ $user->id }}'><em
                                                            class="icon ni ni-trash"></em><span>Delete Access</span></a>
                                                </li>

                                            </ul>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div><!-- .card-preview -->
</div>
@stop
@section('script')
<script>
    $(document).ready(function() {
        $('body').on('click', '#delete_access', function () {
                // var id = $("#delete_id").val();
            
                userId = $(this).data('user');
                username = $(this).data('username');
               
               
                var token = $("meta[name='csrf-token']").attr("content");
                var el = this;
                // alert(user_id);
                resetAccount(el, userId,username);
                });
    
    
            async function resetAccount(el, userId,username) {
                    const willUpdate = await swal({
                        title: "Confirm Access Delete",
                        text: `Are you sure you want to delete access for `+username +`?`,
                        icon: "warning",
                        confirmButtonColor: "#DD6B55",
                        confirmButtonText: "Yes!",
                        showCancelButton: true,
                        buttons: ["Cancel", "Yes, Delete"]
                    });
                    if (willUpdate) {
                        //performReset()
                        performDelete(el,userId);
                    } else {
                        swal("Access will not be detached from "+ username +":)");
                    }
                }
    
    
            function performDelete(el, userId)
                {
                   
                    try {
                            $.get('{{ route('makeuser') }}?id=' + userId,
                            function (data, status) {
                                console.log(status);
                                console.table(data);
                                if( status === "success") {
                                    let alert = swal('success',"Access successfully removed!.",'success');
                                    window.location.reload()
                                    // $(el).closest( "tr" ).remove();
                                    // alert.then(() => {
                                    // });
                                }
                            }
                        );
                    } catch (e) {
                        let alert = swal(e.message);
                    }
                }
        
    })
    
</script>
@stop